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

        if(session()->get('user_session') == ''){
            session()->setFlashdata('eror','login dlu bego');
            return redirect()->to(base_url('login'));
        }else{
            $usercart = $this->cartbase->where('user_id', session()->get('user_id'))->findAll();
        }

        // dd($usercart);

        foreach($usercart as $prod){
            $products[] = $this->prodbase->where('product_id', $prod['product_id'])->first();
        }

        // dd($products);
        if(!empty($products)){
            $data = [
                'title' => 'Keranjangmu',
                'dataprod' => $products,
                'usercart' => $usercart,
            ];
        }else{
            $data = [
                'title' => 'Keranjangmu',
            ];
            session()->setFlashdata('kosonk', 'Keranjang kosong');
        }
        return view('pages/cart',$data);
    }

    public function addcart($id){
        $user_id = session()->get('user_id');

        if (!$user_id) {
            return redirect()->to('/login'); // Redirect ke halaman login jika user belum login
        }

        if(!empty(session()->get('user_id'))){
            if(!empty($this->cartbase->where('product_id', $id)->first())){
                $this->updcart($id);
                return redirect()->back();
            }else{
                $this->cartbase->save([
                    'user_id' => session()->get('user_id'),
                    'product_id' => $id,
                    'qty' => $this->request->getPost('qty_add'),
                ]);
                return redirect()->back();
            }
        }
        return redirect()->to(base_url('login'));
    }
    public function updcart($id){
        $oldqty = $this->cartbase->select('qty')->where('product_id',$id)->first();
        $updqty = $this->request->getPost('qty_add');

        // change data type
        settype($oldqty['qty'],'integer');
        settype($updqty,'integer');
        // d($oldqty);
        $newqty = $oldqty['qty'] + $updqty;
        // dd($newqty);
        $this->cartbase->where('product_id', $id)->set(['qty' => $newqty])->update();
        return;
    }
}