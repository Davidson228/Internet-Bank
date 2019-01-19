<?php
require 'connection.php';

if (empty($_SESSION['clients_id'])) {
  header('locaton: index.php');
}

$app = new \atk4\ui\App('Send/Receive money');
$app->initLayout('Centered');

$form = $app->layout->add('Form');
$form->addField('From')
$form->addField('To')
$form->addField('How much');

$form->onSubmit(function($form) use($db) {

  $bank_account0 = new Bank_account($db);
  $bank_account1 = new Bank_account($db);

  $bank_account0->loadBy('account_number',$form->model['from']);
  $bank_account1->loadBy('account_number',$form->model['to']);

  $bank_account0['how much']= $bank_account0['how much']-$dorm->model['how much'];
  $bank_account0['how much']= $bank_account1['how much']+$dorm->model['how much'];

  $bank_account0->save();
  $bank_account1->save();

  return new \atk4\ui\jsExpression('document.location = "main.php"');
   
});
