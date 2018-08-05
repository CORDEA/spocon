<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 15:19
 */

use authenticator\Credential;
use SpotifyWebAPI\SpotifyWebAPIException;

require 'authenticator/Authenticator.php';
require 'vendor/autoload.php';

$authenticator = new authenticator\Authenticator();
$credential = Credential::restore();

$api = new SpotifyWebAPI\SpotifyWebAPI();
$api->setAccessToken($credential->getAccessToken());

try {
    $api->pause();
} catch (SpotifyWebAPIException $e) {
    $authenticator->refreshToken($credential);
}
