<?php

namespace App\Controllers;

class Homepage extends BaseController {
    public function index() {

        $data = [
            'title' => 'Beranda'
        ];
        return view('homepage', $data);
    }
}