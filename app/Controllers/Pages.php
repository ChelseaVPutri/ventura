<?php 

namespace App\Controllers;
use App\Controllers\BaseController;

class Pages extends BaseController{
    public function home(){
        $data = [
            'title' => 'Beranda'
        ];
        return view('homepage', $data);
    }
    
    public function login(){
        $data = [
            'title' => 'Login',
            'rand' => rand(9999,1000)
        ];
        return view('LoginRegister/login', $data);
    }
    
    public function register(){

        $data = [
            'title' => 'Register',
            'randnum' => rand(9999,1000)
        ];
        return view('LoginRegister/register', $data);
        
    }
    
    public function profile(){
        return view('profile');
    }

    public function cart(){

    }
}
