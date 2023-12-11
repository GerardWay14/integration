<?php 
if(!empty($_POST['add_sales'])) {
    require_once("db.php");

    $item = $_POST["item"];
    $price = $_POST["price"];
    $order_date = $_POST["order_date"];

    $query = " INSERT INTO tbl_orders (item, price, order_date) VALUES ('$item', '$price', '$order_date')";

    if(mysqli_query($con, $query))
    {
        echo '<script>alert("Sales recorded.")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="add_sales2.css">
    <title>Add Sales</title>

</head>
<body>
<div class="container">
    <h3>Add Sold Item</h3>
</br>
    <form action="" method="POST">
        <label>Item</label>
        <input type="text" name="item" required/><br/>
        <label>Price</label>
        <input type="text" name="price" required/><br/>
        <label>Date</label>
        <input type="date" name="order_date" required/><br/>
        <br/>
        <input type="submit" name="add_sales" value="Add Sales">
    </form>

    <hr/>

    <nav>
        <ul>
        <li><a href="../intro.php">Back to Home</a></li>
        <li><a href="index.php">Back to Sales Report</a></li>
        </ul>
    </nav>
</div>
</body>
</html>
