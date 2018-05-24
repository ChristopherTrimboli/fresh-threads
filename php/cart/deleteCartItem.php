<?php
include '../database/db_connect.php';
session_start();

$user = $_SESSION['user'];
$itemID = $_POST["itemID"];
$result = db_query("DELETE FROM ICS199Group12_dev.Cart WHERE Product_ProductID = '$itemID';");