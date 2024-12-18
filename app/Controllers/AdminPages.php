<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ProductModel;

class AdminPages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'loginkan min',
        ];
        return view('admin/admin_login', $data);
    }

    public function dashboard() {
        // $data['total_products'] = $this->productModel->countAll();
        $data = [
            'total_product' => $this->productModel->countAll(),
            'user'          => session()->get('admin_session')
        ];
        return view('admin/admin_dashboard', $data);
    }

    public function managepd()
    {
        if(session()->get('admin_session'))
        {
            $kategori = new \App\Models\CategoryModel();

            $data = [
                'dataproduk'    => $this->productModel->findAll(),
                'categories'     => $kategori->findAll()
            ];
            return view('admin/add_product', $data);
        }
        else{
            return redirect()->to(base_url('admin/login'));
        }
    }

    public function loginadmin()
    {
        $model_admin = new AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $model_admin->getData($username, $password);

        if($cek){
            if(($cek['username'] == $username) && ($cek['password'] == $password)) {
                session()->set('admin_session', [
                    'username' => $cek['username'],
                    'admin_id' => $cek['admin_id'],
                    'is_admin' => true
                ]);
                return redirect()->to(base_url('admin/product-manager'));
            } else {
                session()->setFlashdata('gagal', 'Username/Password salah');
                return redirect()->to(base_url('admin/login'));
            }
        }
        else{
            session()->setFlashdata('notfound', 'akun belum terdaftar tjoy');
            return redirect()->to(base_url('admin/login'));
        }
    }
    
    public function adminLogout() {
        session()->remove('admin_session');
        return redirect()->to(base_url('admin/login'));
    }
}
