<?php
require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

$intro = $app->layout->add('Header')->set('Welcome');

$client = new Clients($db);
$client -> load($_SESSION['clients_id']);

$account = $client ->ref('Bank_account');
$grid = $app->add('Grid');
$grid->setModel($account,['account_number','balance']);

$button1 = $app->add(['Button', 'Send/Receive money']);
$button1->link('sender.php');
