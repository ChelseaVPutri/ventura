<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController {
    public function index() {
        return view('LoginRegister/login');
    }

    public function loginAction() {
        $model_user = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $model_user->getData($username, $password);

        if(($cek['username'] == $username) && ($cek['password'] == $password)) {
            session()->set('email', $cek['email']);
            session()->set('username', $cek['username']);
            session()->set('user_id', $cek['user_id']);
            return redirect()->to(base_url('homepage'));
        } else {
            session()->setFlashdata('gagal', 'Username/Password salah');
            return redirect()->to(base_url('LoginRegister/login'));
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url('LoginRegister/Login'));
    }
}    