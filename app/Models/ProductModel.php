<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'products';
    protected $allowedFields = ['name', 'price', 'stock', 'description'];

    
}