<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/11
 * Time: 16:46
 */

require 'vendor/autoload.php';

class NextController implements IController
{
    private $api;

    public function __construct(\SpotifyWebAPI\SpotifyWebAPI $api)
    {
        $this->api = $api;
    }

    public function call()
    {
        $this->api->next();
    }
}
