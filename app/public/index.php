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

// Setting imports
use App\Http\Foundation\Http;

$request = new Http();
//echo $request->getUri();
//echo $request->getMethod();

// echo $_GET['firstname'];

echo $request->get('firstname');