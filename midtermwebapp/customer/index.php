<?php
require_once("db.php");
?>
<html>

<head>
	<title>Lirio Marketing Table</title>

	<link rel="stylesheet" href="index.css">

</head>

<body>
	<?php
	$pdo_statement = $pdo_conn->prepare("SELECT * FROM  tbl_lirio ORDER BY Customer_ID DESC");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
	?>
	<section>
		<div style="text-align:center;margin:20px 0px;"> <a href="../intro.php" class="button_link">
				<title="AddNew" style="vertical-align:bottom;" /> Return To Homepage
			</a></div>
		<div style="text-align:center;margin:20px 0px;"><a href="add.php" class="button_link"><img src="images/add.png" title="Add New " style="vertical-align:bottom;" /> Add New Record</a></div>
	</section>

	<table class="tbl-qa">
		<thead>
			<tr>
				<th class="table-header" width="15%">First Name</th>
				<th class="table-header" width="15%">Last Name</th>
				<th class="table-header" width="25%">Birthdate</th>
				<th class="table-header" width="40%">Phone Number</th>
				<th class="table-header" width="15%">Address</th>
				<th class="table-header" width="40%">Date Ordered</th>
				<th class="table-header" width="15%">Time Ordered</th>
				<th class="table-header" width="10%">Quantity Ordered</th>
				<th class="table-header" width="10%">Product Name</th>
				<th class="table-header" width="15%">Product Type</th>
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
						<td><?php echo $row["Customer_Fname"]; ?></td>
						<td><?php echo $row["Customer_Lname"]; ?></td>
						<td><?php echo $row["Customer_Birthdate"]; ?></td>
						<td><?php echo $row["Phone"]; ?></td>
						<td><?php echo $row["Address"]; ?></td>
						<td><?php echo $row["Order_Date"]; ?></td>
						<td><?php echo $row["Order_Time"]; ?></td>
						<td><?php echo $row["Order_Quantity"]; ?></td>
						<td><?php echo $row["Product_Name"]; ?></td>
						<td><?php echo $row["Product_Type"]; ?></td>
						<td><?php echo $row["Price"]; ?></td>

						<td>
							<a class="row_button_link" href='edit.php?Customer_ID=<?php echo $row['Customer_ID']; ?>'><img src="images/edit.png" title="Edit" /></a>
							<a class="row_button_link" href='delete.php?Customer_ID=<?php echo $row['Customer_ID']; ?>'><img src="images/delete.png" title="Delete" /></a>
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