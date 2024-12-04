<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController {
    public function index() {

        $data = [
            'title' => 'Login',
            'rand' => rand(9999,1000)
        ];
        return view('LoginRegister/login', $data);
    }

    public function loginAction() {
        $model_user = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $model_user->getData($username, $password);

        if($this->request->getPost('captcha') == $this->request->getPost('captcha-random')){
            if(($cek['username'] == $username) && ($cek['password'] == $password)) {
                session()->set([
                    'email' => $cek['email'],
                    'username' => $cek['username'],
                    'user_id' => $cek['user_id'],
                ]);
                // return redirect()->to(base_url('homepage'));
                var_dump(session()->get('username'));
            } else {
                session()->setFlashdata('gagal', 'Username/Password salah');
                return redirect()->to(base_url('login'));
            }
        }
        else{
            session()->setFlashdata('eror', 'Captcha salah tjoy');
            return redirect()->to(base_url('login'));
        }

    }

    public function logout() {
        session()->destroy();
        return redirect()->to('login');
    }
}    