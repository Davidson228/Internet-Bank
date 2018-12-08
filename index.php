<?php

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

$clients = new Clients($db);
$guests = $clients->ref('Guests');
$form2 = $app->layout->add('Form');
$form2->setModel(new Clients($db),['login','password']);
$form2->buttonSave->set('Login');
$form2->onSubmit(function($form2) use ($clients) {
  $clients->tryLoadBy('login',$form2->model['login']);
  if($clients['password'] == $form2->model['password']) {
    $_SESSION['user_id'] = $clients->id;
    return new \atk4\ui\jsExpression('document.location="main.php"');
  } else {
    $clients->unload();
    $er = (new \atk4\ui\jsNotify('No such user.'));
    $er->setColor('red');
  }
});
