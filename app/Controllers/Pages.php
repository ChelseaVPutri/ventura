<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Controllers\Product;

class Pages extends BaseController{
    public function home(){

        $data = [
            'title' => 'Beranda',
            'dataproduk' => $this->productModel->show()
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
