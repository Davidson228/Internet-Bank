<?php
require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered');

$intro = $app->layout->add('Header')->set('Welcome');

$client = new Clients($db);
$client -> load($_SESSION['user_id']);
