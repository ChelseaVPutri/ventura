<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController{

    protected $randnum;
    protected $captcha;

    public function __construct()
    {
        $this->randnum = rand(9999,1000);
        $this->captcha = $this->randnum;
    }

    public function index(){

        $data = [
            'title' => 'Register',
            'randnum' => $this->captcha
        ];
        return view('LoginRegister/register', $data);
    }

    public function save(){

        $user = new UserModel();

        if($this->request->getPost('captcha') == $this->captcha){
            $user->save([
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
    
            ]);
    
            session()->set([
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username')
            ]);
    
            return redirect()->to('Homepage');
        }
        else{
            session()->setFlashdata('eror', 'Captcha salah tjoy');
            return redirect()->to('register');
        }
    }

    
}