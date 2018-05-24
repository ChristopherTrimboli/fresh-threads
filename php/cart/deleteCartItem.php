<?php
include '../database/db_connect.php';
session_start();

$user = $_SESSION['user'];
$itemID = $_POST["itemID"];
$result = db_query("DELETE FROM fresh_threads.Cart WHERE Product_ProductID = '$itemID';");