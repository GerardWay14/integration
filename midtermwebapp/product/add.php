<?php
if (!empty($_POST["add_record"])) {
    require_once("db.php");
    $sql = "INSERT INTO tbl_product ( Product_Name, Product_Type, Product_Description, Stock) VALUES ( :Product_Name, :Product_Type, :Product_Description, :Stock)";
    $pdo_statement = $pdo_conn->prepare($sql);

    $result = $pdo_statement->execute(array(':Product_Name' => $_POST['Product_Name'], ':Product_Type' => $_POST['Product_Type'], ':Product_Description' => $_POST['Product_Description'], ':Stock' => $_POST['Stock']));
    if (!empty($result)) {
        header('location:index.php');
    }
}
?>
<html>

<head>
    <title>Add New Record</title>
    <link rel="stylesheet" href="add.css">
</head>

<body>
    <div style="margin:20px 0px;text-align:center;"><a href="index.php" class="button_link">Back to List</a></div>
    <br>
    <section>
        <div class="frm-add">
            <h1 class="demo-form-heading">Add New Record</h1>
            <form name="frmAdd" action="" method="POST">
                <div class="demo-form-row">
                    <label>Product Type: </label><br>
                    <select name="Product_Type" id="product-type">
                        <option value="">--Select--</option>
                        <option value="Hardware">Hardware</option>
                        <option value="Accessories">Accessories</option>
                    </select>
                </div>

                <div class="demo-form-row">
                    <label>Product Name: </label><br>
                    <input type="text" name="Product_Name" class="demo-form-field" required />
                </div>

                <div class="demo-form-row">
                    <label>Price: </label><br>
                    <input type="Float" name="Stock" id="product-stock" class="demo-form-field" required />
                </div>

                <script>
                    // product name and price mapping
                    const productPrices = {
                        "White rose": 47,
                        "Rosanna": 48,
                        "Magnolia": 44,
                        "Jasmine": 49,
                        "RC226": 40,
                        "Pellet": 39,
                        "Crackcorn": 34,
                        "Chick booster": 47,
                        "BMEG Hog starter": 40,
                        "BMEG intergra 3000": 49
                    };
                    

                    // get the select elements
                    const productTypeSelect = document.getElementById("product-type");
                    const productNameSelect = document.getElementById("product-name");
                    const productPriceInput = document.getElementById("product-price");

                    // function to update the product name options based on the selected type
                    function updateProductNameOptions() {
                        const selectedType = productTypeSelect.value;
                        const productNamesForType = productNames[selectedType];
                        productNameSelect.innerHTML = "";
                        productNamesForType.forEach(name => {
                            const option = document.createElement("option");
                            option.text = name;
                            option.value = name;
                            productNameSelect.appendChild(option);
                        });
                        updateProductPrice();
                    }

                    // function to update the price field based on the selected product name
                    function updateProductPrice() {
                        const selectedName = productNameSelect.value;
                        const selectedPrice = productPrices[selectedName];
                        productPriceInput.value = selectedPrice;
                    }

                    // add event listeners to the selects to update the options and price
                    productTypeSelect.addEventListener("change", updateProductNameOptions);
                    productNameSelect.addEventListener("change", updateProductPrice);

                    // initialize the options and price
                    updateProductNameOptions();
                </script>




                <div class="demo-form-row">
                    <label>Product Description: </label><br>
                    <textarea name="Product_Description" class="demo-form-field" rows="5" required></textarea>
                </div>


                <div class="demo-form-row">
                    <input name="add_record" type="submit" value="Add" class="demo-form-submit" style="border-radius: 6px">
                </div>
            </form>
        </div>
</body>

</section>

</html>
