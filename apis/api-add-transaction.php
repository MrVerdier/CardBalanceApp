<?php

require_once __DIR__.'/connect.php';


$showTransactions = $db->prepare(
            "SELECT transactions.amount, transactions.type, transactions.balance, transactions.timestamp, notes.note 
            FROM transactions
            INNER JOIN notes ON notes.transaction_id = transactions.transaction_id
            WHERE transactions.id = (SELECT max(id) FROM transactions)");
$showTransactions->execute();
$transactionsInfo = $showTransactions->fetchAll();

foreach($transactionsInfo as $transactionRows){

    $formatted_datetime = date("d/m/y H:i:s", strtotime($transactionRows->timestamp));

    echo "

            <tr>
                <th>$formatted_datetime</th>
                <th>$transactionRows->note</th>
                <th><span>$transactionRows->amount kr</span><br>$transactionRows->balance kr</th>
            </tr>
   
    ";
}

