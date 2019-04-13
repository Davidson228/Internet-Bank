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
$P = ($form->model['How_much']);
$n = ($form->model['On_what_period']);
$i = (0.15);

$result = $form->model['How_much'] (1 + $i * $n);

$form->onSubmit(function($form)'use($i)' {
  $form->model->save();
  return $form->success('OK');
});
