<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use Google\Client;
use Google\Service\Oauth2;
use Google_Client;
use App\Models\UsersModel;

class Auth extends BaseController {
    protected $googleClient;
    protected $users;

    public function __construct() {
        require_once APPPATH. "../vendor/autoload.php";
        $this->googleClient = new Google_Client();
        $this->users = new UsersModel();

        $this->googleClient->setClientId('242333330400-n34qd6bi0pgoacs3d5qnkb9r8jk8ko43.apps.googleusercontent.com');
        $this->googleClient->setClientSecret('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');
        $this->googleClient->setRedirectUri('http://localhost:8080/auth/callback');
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    public function loginGoogle() {
        // $data['link'] = $this->googleClient->createAuthUrl();
        // return view('auth/loginGoogle');
        return redirect()->to($this->googleClient->createAuthUrl());
    }

    public function callback() {
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if(!isset($token['error'])) {
            $this->googleClient->setAccessToken($token['access_token']);
            session()->set("AccessToken", $token['access_token']);

            $googleService = new Oauth2($this->googleClient);
            $data = $googleService->userinfo->get();
            $currentDateTime = date("Y-m-d H:i:s");
            $user_data = array();
            if($this->users->isAlreadyRegister($data['id'])) {
                $user_data = [
                    'username' => $data['name'],
                    'email' => $data['email'],
                    'last_login' => $currentDateTime
                ];
                $this->users->updateUserData($user_data, $data['id']);
            } else {
                $user_data = [
                    'oauth_id' => $data['id'],
                    'username' => $data['name'],
                    'email' => $data['email'],
                    'created_at' => $currentDateTime
                ];
                $this->users->insertUserData($user_data);
            }
            session()->set("LoggedUserData",$user_data);

        } else {
            session()->set("Error", "Something went wrong");
            return redirect()->to('LoginRegister/login');
        }
        return redirect()->to('pages/home');
    }
}