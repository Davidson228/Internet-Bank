<?php
session_start();
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Clicker');
$app->initLayout('Centered');

if(!isset($_SESSION['flag'])){
  $_SESSION['timer'] = time();
  $_SESSION['i'] = 0;
  $_SESSION['t']=0;
}

$now = time();

$_SESSION['t'] = $now - $_SESSION['timer'];


$button = $app->add(['Button','Click','big pink']);
$button->on('click', function($action){
  $_SESSION['flag']=true;
  $_SESSION['i']=$_SESSION['i']+1;
  if ($_SESSION['t'] > 10 ) {
    return new \atk4\ui\jsExpression('document.location = "ban.php" ');
  }

  if ($_SESSION['i'] < 35) {
    return $action->text($_SESSION['i']);
  }

  if (($_SESSION['t']<=35) AND ($_SESSION['i'] >= 1)){
    $_SESSION['win']=true;
    return new \atk4\ui\jsExpression('document.location = "win.php" ');
  }
});
