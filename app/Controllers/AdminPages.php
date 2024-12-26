<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\CategoryModel;

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
        if(session()->get('admin_session')){
            $data = [
                'title'         => 'Dashboard Admin',
                'css'           => 'admin_dashboard',
                'total_product' => $this->productModel->countAll(),
                'user'          => session()->get('admin_session')
            ];
            return view('admin/admin_dashboard', $data);
        }
        else{
            return redirect()->to('admin/login');
        }
        // $data['total_products'] = $this->productModel->countAll();
    }

    public function managepd()
    {
        if(session()->get('admin_session'))
        {
            $kategori = new \App\Models\CategoryModel();

            $data = [
                'title'         => 'Tambah Produk',
                'css'           => 'add-product',
                'dataproduk'    => $this->productModel->findAll(),
                'categories'    => $kategori->findAll(),
                'user'          => session()->get('admin_session')
            ];
            return view('admin/add_product', $data);
        }
        else{
            session()->setFlashdata('null', 'anda belum login');
            return redirect()->to('admin/login');
        }
    }
 
    public function productlist() {
        $kategoriModel = new CategoryModel();
        $keyword = $this->request->getGet('keyword');
        $filter = $this->request->getGet('filter');
        $available = $this->request->getGet('availability');

        if($keyword){
            $produk = $this->productModel->search($keyword);
        } elseif ($available) {
            if($available == 'available') {
                $produk = $this->productModel->filterstok(true);
            } elseif($available == 'habis') {
                $produk = $this->productModel->filterstok(false);
            }
        } elseif($filter){
            $produk = $this->productModel->filter($filter);
        }else{
            $produk = $this->productModel->findAll();
        }

        $kategori = $kategoriModel->findAll();
        if(session()->get('admin_session')){
            $data = [
                'title'         => 'Daftar Produk',
                'user'          => session()->get('admin_session'),
                'dataproduk'    => $produk,
                'kategori'      => $kategori,
            ];
            return view('admin/product_list', $data);
        } else {
            session()->setFlashdata('null', 'anda belum login');
            return redirect()->to('admin/login');
        }
    }

    public function orderlist(){
        if(!session()->get('admin_session')){
            session()->setFlashdata('null', 'anda belum login');
            return redirect()->to('admin/login');
        }
        $orderlist = new \App\Models\OrderModel();
        $detailperorder = $orderlist->join('ordersdetail', 'oID = order_id', 'inner')->join('products', 'pID = product_id', 'inner')->findAll();
        $listorder=[];
        $fetch = 0;
        foreach($detailperorder as $order){
            if($order['order_id'] == $fetch){
                $listorder[$fetch][] = $order;
            }else{
                $fetch = (int)$order['order_id'];
                $listorder[$fetch][] = $order;
            }
        }

        $data = [
            'title'         => 'Daftar Pesanan',
            'css'           => 'admin-order-list',
            'user'          => session()->get('admin_session'),
            'orderdetail'   => $listorder,
        ];

        return view('admin/admin-order-list', $data);

        // if(!session()->get('admin_session')){
        //     session()->setFlashdata('null', 'anda belum login');
        //     return redirect()->to('admin/login');
        // }
    
        // $orderlist = new \App\Models\OrderModel();
        // $detailperorder = $orderlist->join('ordersdetail', 'oID = order_id', 'inner')
        //                             ->join('products', 'pID = product_id', 'inner')
        //                             ->join('users', 'orders.uID = users.user_id', 'inner')  // Join dengan tabel users
        //                             ->join('alamat', 'orders.uID = alamat.user_id', 'inner')  // Gunakan kolom yang benar untuk join dengan alamat
        //                             ->findAll();
    
        // $listorder = [];
        // $fetch = 0;
    
        // foreach($detailperorder as $order){
        //     if($order['order_id'] == $fetch){
        //         $listorder[$fetch][] = $order;
        //     }else{
        //         $fetch = (int)$order['order_id'];
        //         $listorder[$fetch][] = $order;
        //     }
        // }
    
        // $data = [
        //     'title'         => 'Daftar Pesanan',
        //     'css'           => 'admin-order-list',
        //     'user'          => session()->get('admin_session'),
        //     'orderdetail'   => $listorder,
        // ];
    
        // return view('admin/admin-order-list', $data);
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
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                session()->setFlashdata('gagal', 'Username/Password salah');
                return redirect()->to('admin/login');
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

    public function editproduct($id){
        if(session()->get('admin_session')){
            $this->productModel->find($id);
        }else{
            return redirect()->to('admin/login');
        }
    }
}
