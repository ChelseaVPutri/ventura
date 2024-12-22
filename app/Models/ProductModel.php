<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model {

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['product_id', 'name', 'price', 'stock', 'description', 'img', 'category_id'];

    protected $useTimestamp = true;
    protected $updatedField = 'updated_at';
    protected $createdField = 'created_at';

    public function search($keyword){
        return $this->like('name', $keyword)->findAll();
    }

    public function filter($category){
        return $this->like('name', $category)->findAll();
    }

}