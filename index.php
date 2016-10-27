<?php
// Shree Swaminarayanyo Vijayteh //
// Neel Patel
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

/**
 * This file returns the monthly spending and the
 * makes and of in the average month
 */

$transactions = new Transactions();
$transactions->calculateAverage();

echo json_encode($transactions->getTransactionBreakdown(), true);
?>