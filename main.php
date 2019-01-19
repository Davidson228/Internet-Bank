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

$button2 = $app->add('Button');
$button2->set('Exit');
$button2->link('index.php');
