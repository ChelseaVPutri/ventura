<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model {

    protected $table = 'products';
    protected $allowedFields = ['name', 'price', 'stock', 'description', 'img', 'category_id'];

    protected $useTimestamp = true;
    protected $updatedField = 'updated_at';
    protected $createdField = 'created_at';

}