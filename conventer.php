<?php
require 'connection.php';

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

$money = new Money($db);

foreach ($money as $sen) {
  $a[] = $money['name'];
}

$m = new \atk4\data\Model();
$m -> addField('From',['enum'=>$a]);
$m -> addField('To',['enum'=>$a]);
$m -> addField('How_much');
$form = $app->layout->add(['Form']);
$form->setModel($m);
$form->onSubmit(function($form) use($db) {

  $currency0 = new Money($db);
  $currency1 = new Money($db);

  $currency0->loadBy('name',$form->model['From']);
  $currency1->loadBy('name',$form->model['To']);

  $result = ( $form->model['How_much'] / $currency0['coefficient']) * $currency1['coefficient'];

  return $form->success($form->model['How_much'].' '.$form->model['From'].' is '.$result.' '.$form->model['To']);

});

$button2 = $app->add('Button');
$button2->set('Exit');
$button2->link('index.php');

$button3 = $app->add('Button');
$button3->set('Logout');
$button3->link('bank_account.php');

$button4 = $app->add('Button');
$button4->set('Again');
$button4->link('conventer.php');
