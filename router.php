<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 13:14
 */

use authenticator\Credential;

require 'vendor/autoload.php';
require 'authenticator/Credential.php';

$session = new SpotifyWebAPI\Session(
    getenv('SPOTIFY_ID'),
    getenv('SPOTIFY_SECRET'),
    'http://localhost:8080/callback'
);

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $accessToken = $session->getAccessToken();
    $refreshToken = $session->getRefreshToken();

    Credential::store($accessToken, $refreshToken);
} else {
    $options = [
        'scope' => [
            'user-modify-playback-state'
        ],
    ];
    header('Location: ' . $session->getAuthorizeUrl($options));
}
