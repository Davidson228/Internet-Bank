<?php

require 'connection.php';
unset($_SESSION['timer']);
unset($_SESSION['flag']);
unset($_SESSION['timer']);
$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

$clients = new Clients($db);
$form = $app->layout->add('Form');
$form->setModel( new Clients($db),['login','password']);
$form->buttonSave->set('Login');
$form->onSubmit(function($form) use ($clients) {
  $clients->tryLoadBy('login', $form->model['login']);
  if ($clients['password'] == $form->model['password']) {
    if ($clients['login'] == 'admin'){
      if ($clients['password'] == 'admin') {
        return new \atk4\ui\jsExpression('document.location = "admin.php" ');
      }
    }else{
      $_SESSION['clients_id'] = $clients->id;
      return new \atk4\ui\jsExpression('document.location = "bank_account.php" ');
    }
  }else{
    $clients->unload();
    $error = (new \atk4\ui\jsNotify('Alibiderchi'));
    $error->setColor('red');
    return $error;
  }
});

$button1 = $app->add('Button');
$button1->set('Registration');
$button1->link('registration.php');

$button2 = $app->add('Button');
$button2->set('Admin');
$button2->link('admin.php');
 
