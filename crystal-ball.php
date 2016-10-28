<?php
// Shree Swaminarayanyo Vijayteh //
// Neel Patel
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

/**
 * This file returns the monthly spending and the
 * makes and of in the average month without all
 * the donut related transactions
 */

$transactions = new Transactions();
$transactions->getProjectedTransactionsForMonth(2016, 10);
$transactions->calculateAverage();

echo json_encode($transactions->getTransactionBreakdown(), true);