<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersDetailModel extends Model
{
    protected $table            = 'ordersdetail';
    protected $primaryKey       = 'od_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['oID', 'pID', 'address', 'qty'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

}
