<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Google\Client as GoogleClient;
use Google\Service\Oauth2 as GoogleServiceOauth2;

class Auth extends Controller
{
    public function login()
    {
        $client = $this->getGoogleClient();
        $authUrl = $client->createAuthUrl();
        return redirect()->to($authUrl);
    }

    public function callback()
    {
        $client = $this->getGoogleClient();
        if ($this->request->getGet('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getGet('code'));
            if (!isset($token['error'])) {
                session()->set('access_token', $token);
                $service = new GoogleServiceOauth2($client);
                $userinfo = $service->userinfo->get();
                session()->set('user', [
                    'email' => $userinfo->email,
                    'name'  => $userinfo->name,
                    'picture' => $userinfo->picture,
                ]);
                return redirect()->to('/');
            }
        }
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    private function getGoogleClient(): GoogleClient
    {
        $client = new GoogleClient();
        $client->setClientId(env('google.oauthClientId'));
        $client->setClientSecret(env('google.oauthClientSecret'));
        $client->setRedirectUri(base_url('callback'));
        $client->addScope('email');
        $client->addScope('profile');
        if (session()->has('access_token')) {
            $client->setAccessToken(session('access_token'));
        }
        return $client;
    }
}
