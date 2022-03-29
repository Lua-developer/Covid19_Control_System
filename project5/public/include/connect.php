<?php

ob_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "admin";
$db_name = "covid19";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Cannot establish connection to MySql Server.");

?>