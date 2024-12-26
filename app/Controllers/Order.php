<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Order extends BaseController{
    protected $orderlist;
    protected $orderdetail;

    public function __construct()
    {
        $this->orderlist = new \App\Models\OrderModel();
        $this->orderdetail = new \App\Models\OrdersDetailModel();
    }
    public function index(){
        $userorder = $this->orderlist->where('user_id', session()->get('user_id'))->first();
        $detail = $this->orderdetail->where('order_id', $userorder['order_id'])->findAll();

        $data = [
            'orderlist'     => $userorder,
            'orderdetail'   => $detail,
        ];

        return view('order_list', $data);
    }

}