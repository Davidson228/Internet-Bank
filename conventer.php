<?php
require 'connection.php';

$app = new \atk4\ui\App('Internet Bank');
$app->initLayout('Centered')

$money = new Money($db);

foreach ($sen as $money) {
  $a[] = $money['name'];
}

$m = new \atk4\data\Model();
$m -> addField('From what currency',['enum'=>$a]);
$m -> addField('To what currency',['enum'=>$a]);
$m -> addField('How_much');
$form = $app->layout->add(['Form']);
$form->setModel($m);
