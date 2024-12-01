<?php

namespace App\Controllers;

class Homepage extends BaseController {
    public function index() {
        if(session()->get('user_id') == '') {
            session()->setFlashdata('gagal', 'Belum Login');
            return redirect()->to(base_url('LoginRegister/login'));
        }
        return view('homepage');
    }
}