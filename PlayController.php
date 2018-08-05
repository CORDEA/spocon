<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 18:08
 */

require 'vendor/autoload.php';
require 'IController.php';

class PlayController implements IController
{
    private $api;

    public function __construct(\SpotifyWebAPI\SpotifyWebAPI $api)
    {
        $this->api = $api;
    }

    public function call()
    {
        $this->api->pause();
    }
}
