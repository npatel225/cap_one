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
echo "<b>Monthly Spending & Making <u>(including future projection for this month)</u></b><br>".json_encode($transactions->getTransactionBreakdown(),  true);
