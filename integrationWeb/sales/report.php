<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="report2.css">
    <title>Sales Report</title>

</head>

<body>
    <?php 
    require_once("db.php");

    if(isset($_POST['submit']))
    {
        $fromDate = $_POST['fromDate'];
        $toDate = $_POST['toDate'];
    ?>

    <h3>Sales Report From <?php echo $fromDate;?> to <?php echo $toDate;?> </h3>
    <hr/>
    </br>
    <?php 
    $query = mysqli_query($con, "SELECT * FROM `tbl_orders` WHERE order_date BETWEEN '$fromDate' AND '$toDate'");

    $num = mysqli_num_rows($query);

    if($num > 0) {
        $numItems = 0;
        $total = 0;
    ?>

    <table>
        <thead>
            <tr>
                <th>Sold Items</th>
                <th>Price</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $row['item']; ?></td>
                <td><?php echo $price = $row['price'];?></td>
            </tr>

            <?php 
                $total += $price;
                $numItems++;
            } 
            ?>

            <tr>
                <td align="center">Total Sales:</td>
                <td><?php echo $total;?></td>
            </tr>
        </tbody>
    </table>

    <hr/>
    </br>
    <?php
        echo "Total number of items sold: " . $numItems;
    } 
    else {
        echo "No sales records found between $fromDate and $toDate";
    }
    }  
    ?>

    <br/>
    <br/>
    <nav> 
        <ul>
            <li><a href="../intro.php">Back to Home</a></li>
            <li><a href="index.php">Back to Main</a></li>
        </ul>
    </nav> 
</body>

</html>
