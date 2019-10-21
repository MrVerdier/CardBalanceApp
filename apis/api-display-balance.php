<?php

require_once __DIR__.'/connect.php';

$stmt = $db->prepare(" SELECT balance FROM accounts WHERE name = 'Madkort' ");

$stmt->execute();
$accountInfo = $stmt->fetchAll();

foreach($accountInfo as $accountRows){
   $accountBalance = $accountRows->balance; 

    echo $accountBalance; 
}
