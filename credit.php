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
$m -> addField('On_what_period, years');
$m -> addField('How_much');


$form = $app->layout->add('Form');
$form->setModel($m);

$form->onSubmit(function($form) use($i) {
  $P = ($form->model['How_much']);
  $n = ($form->model['On_what_period, years']);
  $i = (0.15);
  $result = $form->model['How_much'] * (1 + 0.15 * $form->model['On_what_period, years']);
  $form->model->Account_number();
  return $form->success('OK');
});
