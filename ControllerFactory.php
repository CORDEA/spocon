<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 18:22
 */

use authenticator\Credential;

require 'vendor/autoload.php';
require 'authenticator/Authenticator.php';
require 'PlayController.php';

class ControllerFactory
{
    public static function create(Credential $credential, $name)
    {
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($credential->getAccessToken());

        switch ($name) {
            case 'PlayController':
                return new PlayController($api);
        }
    }
}
