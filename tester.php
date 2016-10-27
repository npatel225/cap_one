<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/cap_one/stdlib.php");

$api = new BaseController();
$response = $api->getAllTransactions();

?>
