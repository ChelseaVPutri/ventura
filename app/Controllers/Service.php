<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Service extends BaseController {

    public function loginAction() {
        $model_user = new UsersModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $model_user->getData($username, $password);

        if($cek){
            if($this->request->getPost('captcha') == $this->request->getPost('captcha-random')){
                if(($cek['username'] == $username) && ($cek['password'] == $password)) {
                    session()->set('user_session', [
                        'email' => $cek['email'],
                        'username' => $cek['username'],
                        'user_id' => $cek['user_id']
                    ]);
                    return redirect()->to(base_url());
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
        else{
            session()->setFlashdata('notfound', 'akun belum terdaftar tjoy');
            return redirect()->to(base_url('login'));
        }

    }

    
    public function save(){
        
        $user = new UsersModel();
        
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
    
            return redirect()->to(base_url('/'));
        }
        else{
            session()->setFlashdata('eror', 'Captcha salah tjoy');
            return redirect()->to(base_url('register'));
        }
    }

    public function adminreq() {
        
    }
    
    public function logout() {
        session()->destroy();
        return redirect()->to(base_url());
    }
}    