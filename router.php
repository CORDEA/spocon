<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 13:14
 */

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    getenv('SPOTIFY_ID'),
    getenv('SPOTIFY_SECRET'),
    'http://localhost:8080/callback'
);

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $accessToken = $session->getAccessToken();
    $refreshToken = $session->getRefreshToken();

    $json = json_encode(array('access_token' => $accessToken, 'refresh_token' => $refreshToken));
    file_put_contents('credentials.json', $json);
} else {
    $options = [
        'scope' => [
            'user-modify-playback-state'
        ],
    ];
    header('Location: ' . $session->getAuthorizeUrl($options));
}
