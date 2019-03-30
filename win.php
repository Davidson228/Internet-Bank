<?php
require 'connection.php';
$app = new \atk4\ui\App('WIN');
$app->initLayout('Centered');
if ($_SESSION['win']){
  $app->add(['Message',')']);

  }

  $m = $app->add('Menu');
  $sm = $m->AddMenu('Bank_account');

  $client = new Clients($db);
  $client -> load($_SESSION['clients_id']);
  $acc = $client->ref('Bank_account');
  $win = new Bank_account($db);
  foreach ($acc as $shot) {
    $sm->addItem($shot['account_number'])->on('click', function($action) use ($shot) {
    $shot['balance'] = $shot['balance'] + 2;
    $shot -> save();
    return new \atk4\ui\jsExpression('document.location = "bank_account.php" ');
  });
}


  $button3 = $app->add('Button');
  $button3->set('Logout');
  $button3->link('bank_account.php');
