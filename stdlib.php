<?php

spl_autoload_register(function ($class) {
    if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/cap_one/core/$class.php")){
        include $_SERVER['DOCUMENT_ROOT'] . "/cap_one/core/$class.php";
    }
    elseif(file_exists($_SERVER['DOCUMENT_ROOT'] . "/cap_one/data/$class.php")){
        include $_SERVER['DOCUMENT_ROOT'] . "/cap_one/data/$class.php";
    }
});
?>

