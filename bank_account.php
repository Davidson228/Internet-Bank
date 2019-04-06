<?php
require 'connection.php';

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

$client = new Clients($db);
$client -> load($_SESSION['clients_id']);

$account = $client->ref('Bank_account');

$grid = $app->layout->add('Grid');
$grid->setModel($account);
$grid->addQuickSearch(['balance','account_number']);

$button1 = $app->add('Button');
$button1->set('Add new account');
$button1->link('new_account.php');

$button2 = $app->add('Button');
$button2->set('Exit');
$button2->link('index.php');

$button3 = $app->add(['Button', 'Send/Receive money']);
$button3->link('sender.php');

$button7 = $app->add('Button');
$button7->set('MINIGAME');
$button7->link('minigame.php');

$button9 = $app->add('Button');
$button9->set('Conventer');
$button9->link('conventer.php');
