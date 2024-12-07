<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\Config\Config;

class Admin extends BaseController
{
    protected $model_admin;
    protected $validation;
    function __construct() {
        $this->model_admin = new AdminModel();
        $this->validation = \Config\Services::validation();
    }
    public function login()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username harus diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi'
                    ]
                ]
            ];
            if (!$this->validate($rules)) {
                session()->setFlashdata("warning", $this->validation->getErrors());
                return redirect()->to("admin/login");
            }

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $dataAkun = $this->model_admin->getData($username);
            if (!password_verify($password, $dataAkun['password'])) {
                $err[] = "Akun yang anda masukkan tidak sesuai.";
                session()->setFlashdata('username', $username);
                session()->setFlashdata('warning', $err);
                return redirect()->to("admin/login");
            }

            $akun = [
                'akun_username' => $dataAkun['username'],
                'akun_nama_lengkap' => $dataAkun['nama_lengkap'],
                'akun_email' => $dataAkun['email']
            ];
            session()->set($akun);
            return redirect()->to("admin/success");

        }
        return view("admin/admin_login", $data);
    }

    // public function login() {
    //     $AdminModel = new \App\Models\AdminModel();
    //     $login = $this->request->getPost('login');
    //     if($login) {
    //         $err = null;
    //         $username = $this->request->getPost('username');
    //         $password = $this->request->getPost('password');

    //         if($username == '' or $password == '') {
    //             $err = "Masukkan username dan password";
    //         }
    //         if(empty($err)) {
    //             $data_admin = $AdminModel->where('username', $username)->first();
    //             if($data_admin['password'] != md5($password)) {
    //                 $err = 'Password tidak sesuai';
    //             }
    //         }
    //         if(empty($err)) {
    //             $session_data = [
    //                 'admin_id' => $data_admin['admin_id'],
    //                 'username' => $data_admin['username'],
    //                 'password' => $data_admin['password']
    //             ];
    //             session()->set($session_data);
    //             return redirect()->to('admin/AdminHomepage');
    //         }
    //         if($err) {
    //             session()->setFlashdata('username', $username);
    //             session()->setFlashdata('error', $err);
    //             return redirect()->to('admin');
    //         }
    //     }
    //     return view('admin/admin_login');
    // }

    public function success() {
        return view('admin/admin_homepage');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('admin/admin_login');
    }
}
