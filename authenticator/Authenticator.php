<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 17:41
 */

namespace authenticator;

use SpotifyWebAPI\Session;

require 'vendor/autoload.php';
require 'Credential.php';

class Authenticator
{
    private $session;

    public function __construct()
    {
        $this->session = new Session(
            getenv('SPOTIFY_ID'),
            getenv('SPOTIFY_SECRET'),
            'http://localhost:8080/callback'
        );
    }

    public function requestAccessToken($code)
    {
        $this->session->requestAccessToken($code);
        $this->store();
    }

    public function refreshToken(Credential $credential)
    {
        $this->session->refreshAccessToken($credential->getRefreshToken());
        $this->store();
    }

    public function getAuthorizeUrl()
    {
        $options = [
            'scope' => [
                'user-modify-playback-state'
            ],
        ];
        return $this->session->getAuthorizeUrl($options);
    }

    private function store()
    {
        $accessToken = $this->session->getAccessToken();
        $refreshToken = $this->session->getRefreshToken();
        Credential::store($accessToken, $refreshToken);
    }
}