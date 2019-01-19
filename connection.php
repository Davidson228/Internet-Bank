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
   $this->addField('personal_code');
   $this->addField('phone');
   $this->addField('login');
   $this->addField('password',['type'=>'password']);
   $this->hasMany('Bank_account',new Bank_account);
 }
}

class Bank_account extends \atk4\data\Model {
 public $table = 'bank_account';
 function init() {
   parent::init();
   $this->addField('balance',['type'=>'money']);
   $this->addField('account_number');
   $this->hasOne('clients_id',new Clients)->addTitle();

 }
}
