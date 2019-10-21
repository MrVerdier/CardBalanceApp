<?php

$date = date("d");
$regular_transfer = 1500;

if ($date != 25 || $date != 1 )  {
    echo "no transfer";
    exit;
}

$addMoney = $db->prepare(" UPDATE `accounts` SET balance = balance + :amount WHERE id = 1 ");
$addMoney->bindValue(':amount', $regular_transfer);
$addMoney->execute();

echo "money added";