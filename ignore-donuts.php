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
$transactions->disableTransactionsByMerchant('Krispy Kreme Donuts');
$transactions->disableTransactionsByMerchant('DUNKIN #336784');
$transactions->calculateAverage();

echo "<b>Monthly Spending & Making <u>(without Donuts transactions)</u></b><br>".json_encode($transactions->getTransactionBreakdown(),  true);
