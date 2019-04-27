<?php
require 'connection.php';

$app = new \atk4\ui\App('Credit');
$app->initLayout('Centered');

$client = new Clients($db);
$client -> load($_SESSION['clients_id']);

$sen=$client->ref('Bank_account');
foreach ($sen as $s) {
  $a[] = $s['account_number'];
}


$m=new \atk4\data\Model();
$m -> addField('Account_number',['enum'=>$a]);
$m -> addField('On_what_period');
$m -> addField('How_much');


$form = $app->layout->add('Form');
$form->setModel($m);

$form->onSubmit(function($form) use($db) {

  $P = $form->model['How_much'];
  $n = $form->model['On_what_period'];
  $i = 0.15;
  $result = (1 + $i * $n);
    $_SESSION['res'] = $n*$i;
  $result = $P*$result;
  //$_SESSION['res'] = $P.' '.$n.' '.$i;
  $bank_account = new Bank_account($db);

  $bank_account->loadBy('account_number',$form->model['Account_number']);

  $bank_account['balance']= $bank_account['balance'] + $P;

  $bank_account['credit_balance'] = $bank_account['credit_balance'] + $result;

  $bank_account->save();
  return $form->success('OK');

});


$button3 = $app->add('Button');
$button3->set('Logout');
$button3->link('bank_account.php');
