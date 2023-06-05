<?php
/**
 * index.php
 * @author DaCoDeMaNiaK <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 * 
 * Entry point in the application.
 * Every request will be dispatched by this file
 */

ini_set('display_errors', true);
error_reporting(E_ALL);

// Class loader
require_once('./../vendor/autoload.php');

use App\Routing\RouterConfig;

$routerConfig = new RouterConfig();

$match = $routerConfig->match();

if (array_key_exists('name', $match)) {
    echo 'Route exists with ' . $match['name'];
    // Get the controller and the method from matcher
    $controllerAction = explode('#', $match['target']);
    $controllerName = $controllerAction[0]; // App\Controllers\UserController
    $controllerMethod = $controllerAction[1]; // loginForm

    // Instanciate dynamically the controller
    $controller = new $controllerName();
    // Call the associated method
    echo $controller->$controllerMethod();

} else {
    echo 'ko';
}