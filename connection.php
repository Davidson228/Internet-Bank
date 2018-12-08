<?php
session_start();
require 'vendor/autoload.php';


$db = new
\atk4\data\Persistence_SQL('mysql:dbname=internet_bank;host=localhost','root','');

class Clients extends \atk4\data\Model {
 public $table = 'clients';
 function init() {
   parent::init();
   $this->addField('name');
   $this->addField('personal code');
   $this->addField('phone');
   $this->addField('login');
   $this->addField('password');
 }
}
