<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlamatModel;

class Alamat extends BaseController {
    protected $model_alamat;

    public function __construct() {
        $this->model_alamat = new AlamatModel();
    }

    public function index() {
        $user_id = session()->get('user_id');
        $alamat = $this->model_alamat->where('user_id', $user_id)->findAll();
        return view('Pages/daftar-alamat', ['alamat' => $alamat]);
    }

    public function addAddress() {
        // $user_id = session()->get('user_id');
        $data = [
            'user_id' => session()->get('user_id'),
            'nama' => $this->request->getPost('nama'),
            'telepon' => $this->request->getPost('phone'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota_kabupaten' => $this->request->getPost('kota_kab'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
            // 'is_primary' => false
        ];
        $this->model_alamat->save($data);
        return redirect()->back();
            
    }

    public function delAddress($alamat_id) {
        $user_id = session()->get('user_id');
        $this->model_alamat->where('user_id', $user_id)->where('alamat_id', $alamat_id)->delete();
        return redirect()->back();
    }

    public function editAddress($alamat_id) {
        $user_id = session()->get('user_id');
        $alamat = $this->model_alamat->where('user_id', $user_id)->where('alamat_id', $alamat_id)->first();
        return $this->response->setJSON($alamat);
    }

    public function updateAddress($alamat_id) {
        $data = [
            'user_id' => session()->get('user_id'),
            'nama' => $this->request->getPost('nama'),
            'telepon' => $this->request->getPost('phone'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota_kabupaten' => $this->request->getPost('kota_kab'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
            'is_primary' => false
        ];
        $this->model_alamat->update($alamat_id, $data);
        return redirect()->back();
    }

    public function primaryAddress($alamat_id) {
        $user_id = session()->get('user_id');
        $this->model_alamat->set(['is_primary' => 0])->where('user_id', $user_id)->update();
        $this->model_alamat->update($alamat_id, ['is_primary' => 1]);
        return redirect()->back();
    }
}