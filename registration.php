<?php
require 'connection.php';

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

$form = $app->add('Form');
$form->setModel(new Clients($db));
$form->buttonSave->set('Registration');
$form->onSubmit(function($form){
  $form->model->save();
  return $form->success('OK');
});

$button = $app->add('Button');
$button->set('Exit');
$button->link('index.php');
