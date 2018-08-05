<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 18:27
 */

interface IController
{
    public function __construct(\SpotifyWebAPI\SpotifyWebAPI $api);

    public function call();
}
