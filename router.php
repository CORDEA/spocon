<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 13:14
 */

require 'vendor/autoload.php';
require 'authenticator/Authenticator.php';

$authenticator = new authenticator\Authenticator();

if (isset($_GET['code'])) {
    $authenticator->requestAccessToken($_GET['code']);
} else {
    header('Location: ' . $authenticator->getAuthorizeUrl());
}
