<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'order_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['uID', 'total', 'status', 'shipping', 'payment'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected $useTimestamp = true;
    protected $updatedField = 'updated_at';
    protected $createdField = 'created_at';
}
