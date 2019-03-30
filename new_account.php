<?php
require 'connection.php';

$a = 'LV42wert';
for ($i = 1; $i <= 13; $i++) {
   $a = $a.rand(0,9);
}
$b_account = new Bank_account($db);
$b_account['clients_id'] = $_SESSION['clients_id'];
$b_account['account_number'] = $a;
$b_account['balance'] = 0;
$b_account->save();

header('Location: bank_account.php');
