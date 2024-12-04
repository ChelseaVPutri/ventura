<?php

namespace App\Controllers;

use PHPUnit\TextUI\Configuration\Php;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Beranda',
        ];
        // return view('welcome_message');
        return view('homepage', $data);
    }
}