<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

$transactions = new Transactions();
$transactions->calculateAverage();

echo json_encode($transactions->getTransactionBreakdown(), true);
?>
