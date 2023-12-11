<?php
require_once("db.php");
$pdo_statement=$pdo_conn->prepare("DELETE FROM tbl_product WHERE Product_ID=" . $_GET['Product_ID']);
$pdo_statement->execute();
header('location:index.php');
?>
