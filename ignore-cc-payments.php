<?php
// Shree Swaminarayanyo Vijayteh //
// Neel Patel
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

/**
 * This file returns the monthly spending and the
 *
 */

$transactions = new Transactions();
$transactions->removeCreditCardPayments();
echo "Monthly Spending & Making <br>".json_encode($transactions->getTransactionBreakdown(),  true);
echo "<br><br>Removed CC Payment Transactions <br>".json_encode($transactions->getDisabledTransactions(),  true);