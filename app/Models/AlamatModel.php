<?php

namespace App\Models;
use CodeIgniter\Model;

class AlamatModel extends Model {
    protected $table = 'alamat';
    protected $primaryKey = 'alamat_id';
    protected $allowedFields = ['user_id', 'nama', 'telepon', 'provinsi', 'kota_kabupaten', 'kecamatan', 'kelurahan', 'kode_pos', 'alamat_lengkap', 'is_primary'];
}