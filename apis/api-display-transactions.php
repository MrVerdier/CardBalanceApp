<?php

require_once __DIR__.'/connect.php';


$showTransactions = $db->prepare(
            "SELECT transactions.amount, transactions.type, transactions.balance, transactions.timestamp, notes.note 
             FROM transactions
             INNER JOIN notes on notes.transaction_id = transactions.transaction_id
             WHERE account_fk = 1 
             ORDER BY timestamp DESC
             LIMIT 10");
$showTransactions->execute();
$transactionsInfo = $showTransactions->fetchAll();

foreach($transactionsInfo as $transactionRows){

    $formatted_datetime = date("d/m/y H:i:s", strtotime($transactionRows->timestamp));

    echo "
        <tr>
            <th>$formatted_datetime</th>
            <th>$transactionRows->note</th>
            <th>
                <span class='history-balance'>$transactionRows->amount kr</span>
                <br>
                <span class='history-balance'>$transactionRows->balance kr</span>
            </th>
        </tr>
    ";
}

