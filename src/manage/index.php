<?php

include './vendor/autoload.php';

$control = $_GET['control'] ?? 'Index';
$action = $_GET['action'] ?? 'index';

$control = ucfirst(strtolower($control));
//var_dump($contro);
//var_dump($action);
$calss = "app\\$control";

if (!class_exists($calss)) {
    throw  new Exception('Class Not Exists:' . $calss);
    return;
}

$contro = (new $calss());
if (!method_exists($contro, $action)) {
    throw new Exception('Method Not Exists:' . $action);
    return;
}
$contro->$action();