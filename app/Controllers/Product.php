<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\CartModel;

class Product extends BaseController {

    public function index() {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();
        return view('product_list', $data);
    }

    public function detail($id){
        // $product = $this->dataproduk->where('product_id', $id)->first();
        $data['product'] = $this->productModel->find($id);
        return view('pages/product-detail', $data);
        // return redirect()->to(base_url('/product/detail/'.$id));
    }

    public function viewadmin($id){
        $product = $this->productModel->find($id);
        $data = ['title' => 'Detail Produk', 'product'  => $product];
        return view('admin/view_product', $data);
    }

    public function addproduct(){
        $img = $this->request->getFile('imgInp');

        $img->move('assets');
    
        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'category_id' => $this->request->getPost('kategori'),
            'img' => $img->getName(),
        ];
    
        // dd($data);
    
        $this->productModel->save($data);
        session()->setFlashdata('success', 'Produk berhasil ditambahkan');
        return redirect()->back();

        
        // if(!$this->validate(
        //     [
        //         'name' => 'required|max_length[255]|min_length[3]',
        //         'img' => 'uploaded[img]|max_size[img,10]|mime_in[img,image/png,image/jpg,image,jpeg]|is_image[image]|'
        //     ],
        //     [
        //         'name' => 'Kami membutuhkan nama produk',
        //         'img' => 'Produk kamu belum ada fotonya nih masa kosong'
        //         ]
        // )){
        //     // return redirect()->back()->withInput();
        //     echo 'gagal jir';
        // }else{

        // }
    }

    public function updproduct()
    {
        $img = $this->request->getFile('imgInp');
        $oldimg = $this->productModel->select('img')->find($this->request->getPost('pdid'));

        unlink('assets/' . $oldimg['img']);

        $img->move('assets');
        $set = [
            'product_id' => $this->request->getPost('pdid'),
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'category_id' => $this->request->getPost('kategori'),
            'img' => $img->getName(),
        ];
        $this->productModel->save($set);
        return redirect('admin/product-list');
    }

    public function delproduct($id)
    {
        $cartModel = new CartModel();
        $cartModel->where('product_id', $id)->delete();
        $img = $this->productModel->select('img')->where('product_id', $id)->first();

        if($this->productModel->where('product_id', $id)->delete() || unlink('assets/' . $img['img']))
        {
            session()->setFlashdata('success', 'Dihapus');
            return redirect()->back();
        }
        else
        {
            session()->setFlashdata('error', 'Gagal menghapus produk');
            return redirect()->to(base_url('admin/product-list'));
        }
    }

    public function editproduct($id){
        $categoryModel = new CategoryModel();
        $product = $this->productModel->find($id);
        $data = [
            'title' => 'Edit Produk',
            'product' => $product,
            'categories' => $categoryModel->findAll()
        ];
        return view('admin/edit_product', $data);
    }
    
}