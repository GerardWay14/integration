<?php
require_once("db.php");
if(!empty($_POST["save_record"])) {
	$pdo_statement=$pdo_conn->prepare("update tbl_product set  Product_Name='".$_POST['Product_Name']."',    Product_Type='".$_POST['Product_Type' ]."',  Product_Description='".$_POST['Product_Description' ]."',  Stock='".$_POST['Stock']. "'    where Product_ID=" . $_GET["Product_ID"]);
	$result = $pdo_statement->execute();
	if($result) {
		header('location:index.php');
	}
}
$pdo_statement = $pdo_conn->prepare("SELECT * FROM tbl_product where Product_ID=" . $_GET["Product_ID"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<html>
<head>
<title>Edit Record</title>
<link rel="stylesheet" href="edit.css">
</head>
<body>
<div style="margin:20px 0px;text-align:center;"><a href="index.php" class="button_link">Back to List</a></div>
<section>
<div class="frm-add">
<h1 class="demo-form-heading">Edit Record</h1>
<form name="frmAdd" action="" method="POST">

  <div class="demo-form-row">
	  <label>Product Name: </label><br>
	  <input type="text" name="Product_Name" class="demo-form-field" value="<?php echo $result[0]['Product_Name']; ?>" required  />
  </div>

  <div class="demo-form-row">
	  <label>Product Type: </label><br>
	  <select name="Product_Type" class="demo-form-field" value="<?php echo $result[0]['Product_Type']; ?>" required  >
	  <option value="Hardware">Hardware</option>
    <option value="Accessories">Accessories</option>
		</select>
  </div>

  <div class="demo-form-row">
	  <label>Product Description: </label><br>
	  <textarea name="Product_Description" class="demo-form-field" rows="5" required ><?php echo $result[0]['Product_Description']; ?></textarea>
  </div>

  <div class="demo-form-row">
	  <label>Price: </label><br>
	  <input type="float" name="Stock" class="demo-form-field" value="<?php echo $result[0]['Stock']; ?>" required  />
  </div>

  <div class="demo-form-row">
	  <input name="save_record" type="submit" value="Save" class="demo-form-submit">
  </div>

  </form>
</div>
</body>
</section>
</html>
