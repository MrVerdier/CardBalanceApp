<?php

require_once __DIR__.'/connect.php';

$transactionAmount = $_POST['money'];
$tNote = $_POST['transactiontype'];
$userId = $_POST['userid'];
$transactionId = uniqid();

$getBalance = $db->prepare(" SELECT balance FROM accounts WHERE id = 1");
$getBalance->execute();
$accountInfo = $getBalance->fetchAll();
foreach($accountInfo as $accountRows){
   $accountBalance = $accountRows->balance + $transactionAmount; 
}

$addMoney = $db->prepare(" UPDATE `accounts` SET balance = balance + :amount WHERE id = 1 ");
$addMoney->bindValue(':amount', $transactionAmount);
$addMoney->execute();

$transaction = $db->prepare(" INSERT INTO transactions VALUES (null, :id, 1, :user, :amount, 1, :oldBalance, null) ");
$transaction->bindValue(':amount', $transactionAmount);
$transaction->bindValue(':id', $transactionId);
$transaction->bindValue(':user', $userId);
$transaction->bindValue(':oldBalance', $accountBalance);
$transaction->execute();

$transactionNote = $db->prepare(" INSERT INTO notes VALUES (null, :id, :note ) ");
$transactionNote->bindValue(':note', $tNote);
$transactionNote->bindValue(':id', $transactionId);
$transactionNote->execute();