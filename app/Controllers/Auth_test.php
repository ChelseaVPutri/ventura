<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use Google\Client;
use Google\Service\Oauth2;
use Google_Client;
use App\Models\UsersModel;

class Auth extends BaseController {
    public function googleLogin() {
        helper('url');
        require_once APPPATH. "../vendor/autoload.php";
        $client = new Google_Client();
        $client->setClientId('242333330400-n34qd6bi0pgoacs3d5qnkb9r8jk8ko43.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri('http://localhost:8080/auth/google/callback');
        $client->addScope('email');
        $client->addScope('profile');

        return redirect()->to($client->createAuthUrl());
    }

    public function googleCallback() {
        helper('url');
        
    }
}