<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CartModel;

class Cart extends BaseController{

    protected $cartbase;
    protected $prodbase;

    public function __construct()
    {
        $this->cartbase = new CartModel();
        $this->prodbase = new ProductModel();
    }
    
    public function index(){

        if(!session()->get('is_login')){
            session()->setFlashdata('eror','Silakan login terlebih dahulu');
            return redirect()->to(base_url('login'));
        }else{
            $usercart = $this->cartbase->where('user_id', session()->get('user_id'))->findAll();
        }

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


        $user_id = session()->get('user_id');
        if(!session()->get('is_login')) {
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu');
        }

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
}