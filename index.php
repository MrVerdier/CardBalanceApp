<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MadkortMoney</title>
    <link rel="stylesheet" href="stylesheets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>

<div id="status" class="std-container">
<h1>Money on the Madkort</h1>
    <div>
        <h2><span class="balance"><?php include __DIR__.'/apis/api-display-balance.php'; ?></span> kr</h2>
    </div>
</div>


<h2>Tilføj Penge</h2>

<form id="addMoney" class="form-std">
    <input id="transactionAmount" type="text" name="money" placeholder="Beløb">
    <select name="transactiontype" id="TransactionType">
        <option value="Fast indbetaling">Fast indbetaling</option>
        <option value="Ekstra indbetaling">Ekstra indbetaling</option>
    </select>
    <select name="userid" id="userOptionOne">
        <option value="1">Anders</option>
        <option value="2">Katrine</option>
    </select>
    <button>Overfør</button>
</form>   

<h2>Transaktioner</h2>

<form id="spentMoney" class="form-std">
    <input id="transactionRemoveAmount" type="text" name="moneyspent" placeholder="Beløb">
    <input type="text" name="transactionnote" placeholder="Kommentar">
    <select name="userid" id="userOptionTwo">
        <option value="1">Anders</option>
        <option value="2">Katrine</option>
    </select>
    <button>Bekræft</button>
</form>    

<div id="transactionHistory">
    <table id="transactionTable" class="transaction-table">
    <?php require_once __DIR__.'/apis/api-display-transactions.php'; ?>
    </table>
</div>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="script/app.js"></script>
</body>
</html>