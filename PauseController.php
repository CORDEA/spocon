<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/11
 * Time: 16:45
 */

require 'vendor/autoload.php';

class PauseController implements IController
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
