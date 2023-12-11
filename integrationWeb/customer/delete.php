<?php
require_once("db.php");
$pdo_statement=$pdo_conn->prepare("DELETE FROM tbl_lirio WHERE Customer_ID=" . $_GET['Customer_ID']);
$pdo_statement->execute();
header('location:index.php');
?>