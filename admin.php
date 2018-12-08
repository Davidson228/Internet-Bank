<?php
session_start();
require 'vendor/autoload.php';
require 'connection.php';
if((isset($_SESSION['hash'])) && ($_SESSION['hash'] == 'qwerty')) {

  $app = new \atk4\ui\App('Credits');
  $app->initLayout('Centered');



  $crud = $app->layout->add('CRUD');
  $crud->setModel(new Clients($db));


  $button1 = $app->add('Button');
  $button1->set('Logout');
  $button1->link('logout.php');



} else{

header('Location: check.php');

}
