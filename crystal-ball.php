<?php
// Shree Swaminarayanyo Vijayteh //
// Neel Patel
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

/**
 * This file returns the monthly spending and the
 * makes and of in the average month including
 * the rest of the month by using the
 * getProjectedTransactionsForMonth endpoint
 */

$transactions = new Transactions();
$transactions->getProjectedTransactionsForMonth(2016, 10);
echo json_encode($transactions->getTransactionBreakdown(),  true);