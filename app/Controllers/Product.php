<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\WishlistModel;

class Product extends BaseController {

    protected $dataproduk;
    protected $datawishlist;

    public function __construct()
    {
        $this->dataproduk = new ProductModel();
        $this->datawishlist = new WishlistModel();
    }

    public function show(){
        return $this->dataproduk->findAll();
    }

    public function detail($id){
        // $product = $this->dataproduk->where('product_id', $id)->first();
        $data['product'] = $this->dataproduk->find($id);
        return view('pages/product-detail', $data);
        // return redirect()->to(base_url('/product/detail/'.$id));
    }

    public function viewadmin($id){
        
    }

    public function addproduct(){
        $img = $this->request->getFile('img');

        $img->move('assets');
    
        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'img' => $img->getName(),
        ];
    
        // dd($data);
    
        $this->dataproduk->save($data);
        return redirect()->to(base_url('admin/productmanager'));

        
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

    protected function updproduct($id)
    {
        $set = [
            'id' => $id,
            ''
        ];
    }

    public function delproduct($id)
    {
        // $this->dataproduk->delete($id);
        // session()->setFlashdata('success', 'Dihapus');
        // return redirect()->to(base_url('admin/productmanager'));
        if($this->dataproduk->where('product_id', $id)->delete())
        {
            session()->setFlashdata('success', 'Dihapus');
            return redirect()->to(base_url('admin/productmanager'));
        }
        else
        {
            session()->setFlashdata('error', 'Gagal menghapus produk');
            return redirect()->to('admin/productmanager');
        }
    }
}