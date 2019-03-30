<?php
require 'connection.php';
$app = new \atk4\ui\App('WIN');
$app->initLayout('Centered');
if ($_SESSION['win']){
  $app->add(['Message',')']);

  }

  $button3 = $app->add('Button');
  $button3->set('Logout');
  $button3->link('bank_account.php');

  $m = $app->add('Menu');
  $sm = $m->AddMenu('Bank_account');

  $clients - new Clients($db);
  $clients -> load($_SESSION['clients_id']);
  $acc = $clients->ref('Bank_account');
  $win = new Accounts($db);
  foreach ($acc as $shot) {
    $sm->addItem($shot['acc_num'])->on('click', function($action) use ($shot) {
    $shot['money'] = $shot['money'] + 2;
    $shot -> save();
    return new \atk4\ui\jsExpression('document.location = "main.php" ');
  });
