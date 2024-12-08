<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CartModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Exceptions\SessionException;

class Cart extends BaseController{

    protected $cartbase;
    protected $prodbase;

    public function __construct()
    {
        $this->cartbase = new CartModel();
        $this->prodbase = new ProductModel();
    }
    
    public function index(){

        if(session()->get('user_id') == ''){
            echo 'lu blom login dongo';
            return redirect()->to(base_url('login'));
        }else{
            $usercart = $this->cartbase->where('user_id', session()->get('user_id'))->findAll();
        }

        // dd($usercart);

        foreach($usercart as $prod){
            $products[] = $this->prodbase->where('product_id', $prod['product_id'])->first();
        }

        // dd($products);

        $data = [
            'title' => 'Keranjangmu',
            'dataprod' => $products,
            'usercart' => $usercart,
        ];
        return view('pages/cart',$data);
    }

    public function addcart($id){
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