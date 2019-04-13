<?php
require 'connection.php';
if((isset($_SESSION['hash'])) && ($_SESSION['hash'] == 'qwerty')) {

  $app = new \atk4\ui\App('Internet Bank');
  $app->initLayout('Centered');

  $crud = $app->layout->add('CRUD');
  $crud->setModel(new Money($db));

  $crud = $app->layout->add('CRUD');
  $crud->setModel(new Clients($db));


  $button1 = $app->add('Button');
  $button1->set('Logout');
  $button1->link('index.php');



} else{

header('Location: check.php');

}
