<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrdersDetailModel;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\AlamatModel;

class Cart extends BaseController{

    protected $cartbase;
    protected $prodbase;
    protected $model_alamat;
    protected $order_model;
    protected $order_detail_model;

    public function __construct()
    {
        $this->cartbase = new CartModel();
        $this->prodbase = new ProductModel();
        $this->model_alamat = new AlamatModel();
        $this->order_model = new OrderModel();
        $this->order_detail_model = new OrdersDetailModel();
    }
    
    public function index(){

        if(!session()->get('is_login')){
            session()->setFlashdata('eror','Silakan login terlebih dahulu');
            return redirect()->to(base_url('login'));
        }

        // get user cart
        $usercart = $this->cartbase->where('user_id', session()->get('user_id'))->findAll();

        // dd($usercart);
        $products = [];
        $total_price = 0;
        foreach($usercart as $prod){
            $product = $this->prodbase->where('product_id', $prod['product_id'])->first();
            if($product) {
                $product['qty'] = $prod['qty'];
                $total_price += $product['price'] * $prod['qty'];
                $products[] = $product;
            } else {
                $total_price = 0;
            }
        }

        // dd($products);
        if(!empty($products)){
            $data = [
                'title' => 'Keranjangmu',
                'dataprod' => $products,
                'usercart' => $usercart,
                'total_price' => $total_price
            ];
        }else{
            $data = [
                'title' => 'Keranjangmu',
            ];
            session()->setFlashdata('kosonk', 'Keranjang kosong');
        }
        return view('pages/cart',$data);
    }

    public function addcart($product_id){
        // $user_id = session()->get('user_id');

        // if (!$user_id) {
        //     return redirect()->to('/login'); // Redirect ke halaman login jika user belum login
        // }

        // if(!empty(session()->get('user_id'))){
        //     if(!empty($this->cartbase->where('product_id', $id)->first())){
        //         $this->updcart($id);
        //         return redirect()->back();
        //     }else{
        //         $this->cartbase->save([
        //             'user_id' => session()->get('user_id'),
        //             'product_id' => $id,
        //             'qty' => $this->request->getPost('qty_add'),
        //         ]);
        //         return redirect()->back();
        //     }
        // }
        // return redirect()->to(base_url('login'));


        if(!session()->get('is_login')) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu');
        }
        $user_id = session()->get('user_id');

        $product = $this->prodbase->find($product_id);
        $stock = $product['stock'];
        $qty_add = (int) $this->request->getPost('qty_add');

        $product_cart = $this->cartbase->where('user_id', $user_id)->where('product_id', $product_id)->first();
        // dd($this->cartbase->getLastQuery());
        if($product_cart) {
            $curr_qty = (int) $product_cart['qty'];
            $new_qty = $curr_qty + $qty_add;
            if($new_qty > $stock) {
                $remain_stock = $stock - $curr_qty;
                return redirect()->back()->with('error', "Stock tidak mencukupi. Hanya tersisa $remain_stock lagi");
            } 
            // $this->cartbase->update($product_cart['cart_id'], ['qty' => $new_qty]);
            $this->cartbase->where('cart_id', $product_cart['cart_id'])->set(['qty' => $new_qty])->update();

        } else {
            if($qty_add > $stock) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi');
            }
            $this->cartbase->save(['user_id' => $user_id, 'product_id' => $product_id, 'qty' => $qty_add]);
        }
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function delcart($product_id) {
        if(!session()->get('is_login')) {
            session()->setFlashdata('eror', 'Silakan login terlebih dahulu');
            return redirect()->to('/login');
        }

        $user_id = session()->get('user_id');
        $this->cartbase->where('user_id', $user_id)->where('product_id', $product_id)->delete();
        return redirect()->back();
    }

    public function clearcart() {
        if(!session()->get('is_login')) {
            session()->setFlashdata('eror', 'Silakan login terlebih dahulu');
            return redirect()->to('/login');
        }

        $user_id = session()->get('user_id');
        $this->cartbase->where('user_id', $user_id)->delete();
        return redirect()->back();
    }
    // public function updcart($id){
    //     $oldqty = $this->cartbase->select('qty')->where('product_id',$id)->first();
    //     $updqty = $this->request->getPost('qty_add');

    //     // change data type
    //     settype($oldqty['qty'],'integer');
    //     settype($updqty,'integer');
    //     // d($oldqty);
    //     $newqty = $oldqty['qty'] + $updqty;
    //     // dd($newqty);
    //     $this->cartbase->where('product_id', $id)->set(['qty' => $newqty])->update();
    //     return;
    // }

    public function checkout(){
        $order_model = new \App\Models\OrderModel();
        $order_detail_model = new \App\Models\OrdersDetailModel();

        if(!session()->get('is_login')) {
            session()->setFlashdata('eror', 'Silakan login terlebih dahulu');
            return redirect()->to('/login');
        }

        $usercart = $this->cartbase->where('user_id', session()->get('user_id'))->findAll();

        $products = [];
        foreach($usercart as $prod){
            $product = $this->prodbase->where('product_id', $prod['product_id'])->first();
            $products[] = $product;
        }

        $user_id = session()->get('user_id');
        $primary_address = $this->model_alamat->where('user_id', $user_id)->where('is_primary', 1)->first();

        $data = [
            'title' => 'Keranjangmu',
            'dataprod' => $products,
            'usercart' => $usercart,
            'primary_address' => $primary_address
        ];


        return view('pages/checkout', $data);
    }

    public function order() {
        $user_id = session()->get('user_id');
        $primary_address = $this->model_alamat->where('user_id', $user_id)->where('is_primary', 1)->first();
        $usercart = $this->cartbase->where('user_id', $user_id)->findAll();

        $products = [];
        foreach ($usercart as $prod) {
            $product = $this->prodbase->where('product_id', $prod['product_id'])->first();
            $products[] = $product;
        }

        $ongkir = $this->request->getPost('ongkir');
        $payment = $this->request->getPost('payment');
        $total = $this->request->getPost('totall');

        $order_data = [
            'uID' => $user_id,
            'total' => $total,
            'status' => 'Sedang Diproses',
            'shipping' => $ongkir,
            'payment' => $payment
        ];
        $this->order_model->insert($order_data);
        $order_id = $this->order_model->getInsertID();

        foreach($usercart as $prod) {
            $product = $this->prodbase->where('product_id', $prod['product_id'])->first();
            $order_detail = [
                'oID' => $order_id,
                'pID' => $prod['product_id'],
                'address' => $primary_address['alamat_id'], // Alamat pengiriman
                'qty' => $prod['qty']
            ];
            $this->order_detail_model->insert($order_detail);

            $new_stock = $product['stock'] - $prod['qty'];
            $this->prodbase->update($product['product_id'], ['stock' => $new_stock]);
        }
        $this->cartbase->where('user_id', $user_id)->delete();
        return redirect()->to('/orders');
    }

   
//     public function order(){
//         $cart = new \App\Models\CartModel();
//         $order = new \App\Models\OrderModel();
//         $orderdetail = new \App\Models\OrdersDetailModel();
    
//         // Menentukan metode pengiriman berdasarkan ongkir yang dipilih
//         if ($this->request->getPost('ongkir') == '12000') {
//             $shipping = 'Normal';
//         }
//         if ($this->request->getPost('ongkir') == '15000') {
//             $shipping = 'Kargo';
//         }
//         if ($this->request->getPost('ongkir') == '35000') {
//             $shipping = 'Next Day';
//         }
//         if ($this->request->getPost('ongkir') == '50000') {
//             $shipping = 'Same Day';
//         }
    
//         // Menyimpan data order
//         $order->save([
//             'uID'       => session()->get('user_id'),
//             'total'     => $this->request->getPost('totall'),
//             'status'    => 1,
//             'shipping'  => $shipping,
//             'payment'   => $this->request->getPost('payment'),
//         ]);
    
//         // Mengambil alamat utama pengguna
//         $alamat = $this->model_alamat
//                            ->where('user_id', session()->get('user_id'))
//                            ->where('is_primary', 1)  // Asumsi ada kolom 'is_primary' yang menandakan alamat utama
//                            ->get()
//                            ->getRowArray();
    
//         // Jika alamat ditemukan
//         if ($alamat) {
//             $usercart = $cart->where('user_id', session()->get('user_id'))->findAll();
//             $count = 0;
    
//             foreach ($usercart as $product) {
//                 // Mengambil stok produk
//                 $stock = $this->prodbase->select('stock')->where('product_id', $product['product_id'])->first();
    
//                 // Mengupdate stok produk setelah transaksi
//                 $this->prodbase->update($product['product_id'], [
//                     'stock' => (int)$stock['stock'] - (int)$product['qty'],
//                 ]);
    
//                 // Menyimpan detail order ke dalam tabel ordersdetail
//                 $data = [
//                     'oID'       => $order->getInsertID(),
//                     'pID'       => $product['product_id'],
//                     'address'   => $alamat['alamat_id'], // Menggunakan alamat_id dari data alamat utama
//                     'qty'       => $product['qty'],
//                 ];
    
//                 $orderdetail->save($data);
//             }
    
//             // Menghapus data di cart setelah pemesanan
//             $cart->where('user_id', session()->get('user_id'))->delete();
//         } else {
//             // Jika tidak ada alamat utama ditemukan, Anda bisa memberikan pesan error atau menangani sesuai kebutuhan
//             return redirect()->back()->with('error', 'Alamat utama tidak ditemukan.');
//         }
    
//         // Redirect setelah pemesanan selesai
//         return redirect('/');
//     }
    
}