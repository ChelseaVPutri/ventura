<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\Product;

class Pages extends BaseController{
    public function home(){
        $kategori = new \App\Models\CategoryModel();
        $keyword = $this->request->getGet('keyword');

        if($keyword){
            $produk = $this->productModel->search($keyword);
        }else{
            $produk = $this->productModel->findAll();
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

    public function cart(){

    }

    public function wishlist() {
        return view('Pages/wishlist');
    }
}
