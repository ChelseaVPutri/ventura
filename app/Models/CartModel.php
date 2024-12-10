<?php

namespace App\Models;
use CodeIgniter\Model;

class CartModel extends Model{
    protected $table = 'carts';
    protected $primarykey = 'cart_id';

    protected $allowedFields = ['user_id', 'product_id', 'qty'];
}