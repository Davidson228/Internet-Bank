<?php

require 'vendor/autoload.php';
require 'connection.php';
$app = new \atk4\ui\App('Login');
$app->initLAyout('Centered');

$clients = new Clients($db);
$form = $app->layout->add('Form');
$form->setModel( new Clients($db),['login','password']);
$form->buttonSave->set('Login');
$form->onSubmit(function($form) use ($clients) {
  $clients->tryLoadBy('name', $form->model['name']);
  if ($clients['password'] == $form->model['password']) {
    if ($clients['name'] == 'admin'){
      if ($clients['passord'] == 'admin') {
        return new \atk4\ui\jsExpression('document.location = "admin.php" ');
      }
    }else{
      $_SESSION['clients_id'] = $clients->id;
      return new \atk4\ui\jsExpression('document.location = "index.php" ');
    }
  }else{
    $clients->unload();
    $error = (new \atk4\ui\jsNotify('Alibiderchi'));
    $error->setColor('red');
    return $error;
  }
});
