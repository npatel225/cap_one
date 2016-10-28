<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

$transactions = new Transactions();
echo json_encode((array)$transactions->getTransactions(), true);
?>
