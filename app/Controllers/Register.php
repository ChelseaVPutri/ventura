<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController{

    protected $randnum;

    public function __construct()
    {

    }

    public function index(){

        $this->randnum = rand(9999,1000);

        $data = [
            'title' => 'Register',
            'randnum' => $this->randnum
        ];
        return view('LoginRegister/register', $data);
    }

    public function save(){

        $user = new UserModel();

        if($this->request->getPost('captcha') == $this->request->getPost('captcha-random')){
            $user->save([
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
    
            ]);
    
            session()->set([
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'user_id' => $user->getInsertID()
            ]);
    
            return redirect()->to(base_url('homepage'));
        }
        else{
            session()->setFlashdata('eror', 'Captcha salah tjoy');
            return redirect()->to(base_url('register'));
        }
    }

    
}