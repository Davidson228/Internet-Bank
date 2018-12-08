<?php

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

$form = $app->add('Form');
$form->setModel(new Clients($db));
$form->buttonSave->set('Login');
$form->onSubmit(function($form){
  $form->model->save();
  return $form->success('OK');
});
