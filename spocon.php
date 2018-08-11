<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 15:19
 */

use authenticator\Credential;
use SpotifyWebAPI\SpotifyWebAPIException;

require 'vendor/autoload.php';
require 'ControllerFactory.php';

$opt = new GetOpt\GetOpt();
$opt->addCommands([
    GetOpt\Command::create('play', 'PlayController::call'),
    GetOpt\Command::create('pause', 'PauseController::call'),
    GetOpt\Command::create('previous', 'PreviousController::call'),
    GetOpt\Command::create('next', 'NextController::call'),
]);

$opt->process();

$command = $opt->getCommand();
if (!$command) {
    return;
}

list ($class, $method) = explode('::', $command->getHandler());
print $class;

$authenticator = new authenticator\Authenticator();
$credential = Credential::restore();
$controller = ControllerFactory::create($credential, $class);

try {
    $controller->call();
} catch (SpotifyWebAPIException $e) {
    $authenticator->refreshToken($credential);
}
