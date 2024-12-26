<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Order extends BaseController{
    protected $orderlist;
    protected $orderdetail;
    protected $prodbase;
    protected $model_alamat;

    public function __construct()
    {
        $this->orderlist = new \App\Models\OrderModel();
        $this->orderdetail = new \App\Models\OrdersDetailModel();
        $this->prodbase = new \App\Models\ProductModel();
        $this->model_alamat = new \App\Models\AlamatModel();
    }

    public function index() {
        if (!session()->get('is_login')) {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu');
            return redirect()->to('/login');
        }

        $user_id = session()->get('user_id');
        $orders = $this->orderlist->where('uID', $user_id)->findAll();

        $order_details = [];
        $products = [];
        foreach ($orders as $order) {
            $details = $this->orderdetail->where('oID', $order['order_id'])->findAll();
            $order_details[] = $details;

            foreach ($details as $detail) {
                $product = $this->prodbase->find($detail['pID']);
                $products[] = $product; // Simpan produk ke dalam array
            }
        }

        $data = [
            'title' => 'Daftar Pesanan',
            'orders' => $orders,
            'order_details' => $order_details,
            'products' => $products
        ];

        return view('pages/daftar-pesanan', $data);

    }

    public function adminIndex() {
        $orders = $this->orderlist->findAll();
        $orderDetails = [];
    
        foreach ($orders as $order) {
            $order['details'] = $this->orderdetail->where('oID', $order['order_id'])->findAll();
            $address = $this->model_alamat->find($order['address']);  // Ambil alamat berdasarkan ID
            $order['address'] = $address; // Menyimpan alamat di data pesanan
            $orderDetails[] = $order;
        }
    
        return view('admin/admin-order-list', ['orderDetails' => $orderDetails]);
    }

    public function updateStatus($orderId) {
        $newStatus = $this->request->getPost('status');
        $this->orderlist->update($orderId, ['status' => $newStatus]);
        return redirect()->to('admin/admin-order-list');
    }
    // public function index(){
    //     $userorder = $this->orderlist->where('user_id', session()->get('user_id'))->first();
    //     $detail = $this->orderdetail->where('order_id', $userorder['order_id'])->findAll();

    //     $data = [
    //         'orderlist'     => $userorder,
    //         'orderdetail'   => $detail,
    //     ];

    //     return view('order_list', $data);
    // }

}