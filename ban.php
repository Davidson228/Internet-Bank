<?php
require 'connection.php';
$app = new \atk4\ui\App('BAN');
$app->initLayout('Centered');
$app->add(['Message','Na ban']);

$button3 = $app->add('Button');
$button3->set('Logout');
$button3->link('bank_account.php');
