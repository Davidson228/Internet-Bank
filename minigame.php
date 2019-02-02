<?php
session_start();
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Clicker');
$app->initLayout('Centered');

if(isset($_SESSION['timer'])){
  $_SESSION['timer'] = time();
}

$now = time();

$_SESSION['i'] = $now - $_SESSION['timer'];

$button = $app->add(['Button','Click','big pink']);
$button->on('click', function($action){
  $_SESSION['i']=$_SESSION['i']+1;
  return $action->text($_SESSION['i']);
});
