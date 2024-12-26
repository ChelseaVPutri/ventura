<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\Product;

class Pages extends BaseController{
    public function home(){
        $kategori = new \App\Models\CategoryModel();
        $keyword = $this->request->getGet('keyword');
        $filter = $this->request->getGet('filter');

        if($keyword){
            $produk = $this->productModel->search($keyword)->where('stock >', 0)->findAll();
        }elseif($filter){
            $produk = $this->productModel->filter($filter)->where('stock >', 0)->findAll();
        }else{
            $produk = $this->productModel->where('stock >', 0)->findAll();
        }

        // dd($keyword);

        $data = [
            'title'         => 'Beranda',
            'dataproduk'    => $produk,
            'kategori'      => $kategori->findAll()
        ];
        return view('Pages/homepage', $data);
    }
    
    public function login(){
        $data = [
            'title' => 'Login',
            'rand' => rand(9999,1000)
        ];
        return view('Pages/login', $data);
    }
    
    public function register(){

        $data = [
            'title' => 'Register',
            'randnum' => rand(9999,1000)
        ];
        return view('Pages/register', $data);
        
    }
    
    public function profile(){
        return view('Pages/profile');
    }

    public function alamat(){
        return view('Pages/daftar-alamat');
    }

    public function cart(){

    }

    public function wishlist() {
        return view('Pages/wishlist');
    }
}
