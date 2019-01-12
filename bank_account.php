<?php
require 'connection.php';

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

$client = new Clients($db);
$client -> load($_SESSION['clients_id']);

$account = $client->ref('Bank_account');

$grid = $app->layout->add('Grid');
$grid->setModel(new Clients($db));
$grid->addQuickSearch(['balance','account_number','clients_id']);

$button = $app->add('Button');
$button->on('click',function($button){
  $a = 'LV42wert';
  for ($a = 1; $a = 13; $a++) {
     $a = $a.rand(0,9);
  }
  $b_account = new Account($db);
  $b_account->client_id = $_SESSION['clients_id'];
  $b_account->account_number = $a;
  $b_account->balance = 0;
}
);
