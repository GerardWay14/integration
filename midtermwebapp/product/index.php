<?php
require_once("db.php");
?>
<html>

<head>
    <title>Product Table</title>

    <link rel="stylesheet" href="styles2.css">

</head>

<body>
    <?php
    $pdo_statement = $pdo_conn->prepare("SELECT * FROM  tbl_product ORDER BY Product_ID DESC");
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();
    ?>
    <section>
        <div style="text-align:center;margin:20px 0px;"><a href="../intro.php" class="button_link"><title="GoBack" style="vertical-align:bottom;" /> Return To Homepage</a>
        </div>
        <div style="text-align:center;margin:20px 0px;"><a href="add.php" class="button_link"><img src="images/add.png" title="Add New" style="vertical-align:bottom;" /> Add New Item</a></div>
    </section>
    <table class="tbl-qa">
        <thead>
            <tr>
                <th class="table-header" width="20%">Product Name</th>
                <th class="table-header" width="20%">Product Type</th>
                <th class="table-header" width="25%">Product Description</th>
                <th class="table-header" width="10%">Price</th>
                <th class="table-header" width="10%"></th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            if (!empty($result)) {
                foreach ($result as $row) {
            ?>
                    <tr class="table-row">
                        <td><?php echo $row["Product_Name"]; ?></td>
                        <td><?php echo $row["Product_Type"]; ?></td>
                        <td><?php echo $row["Product_Description"]; ?></td>
                        <td><?php echo $row["Stock"]; ?></td>

                        <td>
                            <a class="row_button_link" href='edit.php?Product_ID=<?php echo $row['Product_ID']; ?>'><img src="images/edit.png" title="Edit" /></a>
                            <a class="row_button_link" href='delete.php?Product_ID=<?php echo $row['Product_ID']; ?>'><img src="images/delete.png" title="Delete" /></a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>


</html>
