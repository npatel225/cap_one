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
echo "<b>Monthly Spending & Making</b><br>".json_encode($transactions->getTransactionBreakdown(),  true);
echo "<br><br><b>Removed CC Payment Transactions (Verification Purpose)</b><br>".json_encode($transactions->getDisabledTransactions(),  true);

