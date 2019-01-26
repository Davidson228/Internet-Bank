<?php
require 'connection.php';

if (empty($_SESSION['clients_id'])) {
  header('locaton: index.php');
}

$app = new \atk4\ui\App('Send/Receive money');
$app->initLayout('Centered');

$form = $app->layout->add('Form');
$form->addField('From');
$form->addField('To');
$form->addField('How_much');

$form->onSubmit(function($form) use($db) {

  $bank_account0 = new Bank_account($db);
  $bank_account1 = new Bank_account($db);

  $bank_account0->loadBy('account_number',$form->model['From']);
  $bank_account1->loadBy('account_number',$form->model['To']);

  $bba0=$bank_account0['balance'];
  $bba1=$bank_account1['balance'];

  $bank_account0['balance']= $bank_account0['balance']-$form->model['How_much'];
  $bank_account1['balance']= $bank_account1['balance']+$form->model['How_much'];

  $bank_account0->addHook('beforeSave', function($bank_account0) use($bank_account1, $bba0, $bba1, $form){
    if($bank_account0['balance'] < $form->model['How_much']) {
      $bank_account0['balance']=$bba0;
      $bank_account1['balance']=$bba1;

      $error = (new \atk4\ui\jsNotify('Not enough money...'));
      $error->setColor('red');
      return $error;
    }
  });

  $bank_account0->save();
  $bank_account1->save();
  //sleep(1000);
  return new \atk4\ui\jsExpression('document.location = "main.php"');

});

$button2 = $app->add('Button');
$button2->set('Exit');
$button2->link('index.php');

$button3 = $app->add('Button');
$button3->set('Logout');
$button3->link('bank_account.php');
