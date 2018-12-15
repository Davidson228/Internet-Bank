<?php
require 'connection.php';

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

class Bank_accoun extends \atk4\data\Model {
 public $table = 'clients';
 function init() {
   parent::init();
   $this->addField('balance');
   $this->addField('account_number');
   $this->addField('clients_id');
 }
}

$client = new Clients($db);
$client -> load($_SESSION['user_id']);

$account = $client->ref('Account');

$grid = $app->layout->add('Grid');
$grid->setModel(new Clients($db));
$grid->addQuickSearch(['balance','account_number','clients_id']);

$buuton = $app->add('Button');
$button->on('click',function($button){
  $a = 'LV42wert';
  for ($a = 1; $a = 13; $a++) {
     $a = $a.rand(0,9);
  }
  $b_account = new Account($db);
  $b_account->client_id = $_SESSION['user_id'];
  $b_account->account_number = $a;
  $b_account->balance = 0
});
