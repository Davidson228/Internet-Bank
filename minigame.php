<?php
session_start();
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Clicker');
$app->initLayout('Centered');

if(!isset($_SESSION['flag'])){
  $_SESSION['timer'] = time();
}

$now = time();

$_SESSION['t'] = $now - $_SESSION['timer'];

if ($_SESSION['t']<=10) || ($_SESSION['i']==5){

  $_SESSION['t']=0;
}

$button = $app->add(['Button','Click','big pink']);
$button->on('click', function($action){
  $_SESSION['flag']=true;
  $_SESSION['i']=$_SESSION['i']+1;
  return $action->text($_SESSION['i']);
});

$vp = $layout->add('VirtualPage');
$vp->add('Molodec');
