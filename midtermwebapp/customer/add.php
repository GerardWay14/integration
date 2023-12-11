<?php
if (!empty($_POST["add_record"])) {
    require_once("db.php");
    $sql = "INSERT INTO tbl_lirio (Customer_Fname, Customer_Lname, Customer_Birthdate, Phone, Address, Order_Date, Order_Time, Order_Quantity, Product_Name, Product_Type, Price) VALUES (:Customer_Fname, :Customer_Lname, :Customer_Birthdate, :Phone, :Address, :Order_Date, :Order_Time, :Order_Quantity, :Product_Name, :Product_Type, :Price)";
    $pdo_statement = $pdo_conn->prepare($sql);

    // Get the current date and time
    $orderDate = date("Y-m-d");
    $orderTime = date("H:i:s");

    $result = $pdo_statement->execute(array(
        ':Customer_Fname' => $_POST['Customer_Fname'],
        ':Customer_Lname' => $_POST['Customer_Lname'],
        ':Customer_Birthdate' => $_POST['Customer_Birthdate'],
        ':Phone' => $_POST['Phone'],
        ':Address' => $_POST['Address'],
        ':Order_Date' => $orderDate, // Use the current date
        ':Order_Time' => $orderTime, // Use the current time
        ':Order_Quantity' => $_POST['Order_Quantity'],
        ':Product_Name' => $_POST['Product_Name'],
        ':Product_Type' => $_POST['Product_Type'],
        ':Price' => $_POST['Price']
    ));

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
    <section>
        <div class="frm-add">
            <h1 class="demo-form-heading">Add New Record</h1>
            <form name="frmAdd" action="" method="POST">
                <div class="demo-form-row">
                    <label>First Name: </label><br>
                    <input type="text" name="Customer_Fname" class="demo-form-field" required />
                </div>

                <div class="demo-form-row">
                    <label>Last Name: </label><br>
                    <input type="text" name="Customer_Lname" class="demo-form-field" required />
                </div>

                <div class="demo-form-row">
                    <label>Birthdate: </label><br>
                    <input type="date" name="Customer_Birthdate" class="demo-form-field" required />
                </div>

                <div class="demo-form-row">
                    <label>Phone Number: </label><br>
                    <input type="tel" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required name="Phone" class="demo-form-field" required />
                    <br>
                    <span class="phoneformat"> Phone number format: xxxx-xxx-xxxx </span>
                    <br>
                </div>

                <div class="demo-form-row">
                    <label>Address: </label><br>
                    <textarea name="Address" class="demo-form-field" rows="5" required></textarea>
                </div>

                

                <div class="demo-form-row">
                    <label>Quantity Ordered: </label><br>
                    <input type="Number" name="Order_Quantity" class="demo-form-field" required />
                </div>

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
                    <select name="Product_Name" id="product-name">
                        <option value="">--Select--</option>
                    </select>
                </div>

                <div class="demo-form-row">
                    <label>Price:</label><br>
                    <input name="Price" id="product-price" class="demo-form-field" required />
                </div>

                <script>
                    // Define the products object with the available options and stock values
                    const products = {
                        "Hardware": {
                            "RAM": 3500,
                            "Motherboard": 2800,
                            "Hard Disk": 4000,
                            "GPU": 3760,
                            "Video Card": 2900,
                            "Sound Card": 1700,
                            "Network Interface Card": 2500,
                            "Cooling System": 2250,
                            "Ethernet Card": 1500
                        },
                        "Accessories": {
                            "Power Supply Unit": 5600,
                            "Computer Case": 3470,
                            "Keyboard": 2940,
                            "Mouse": 1480,
                            "Speakers/Headphones": 2390,
                            "Monitor ": 4480
                        }
                    };

                    // Get the select elements
                    const productTypeSelect = document.getElementById("product-type");
                    const productNameSelect = document.getElementById("product-name");
                    const productStockInput = document.getElementById("product-price");

                    // Add event listeners to sync the options and stock
                    productTypeSelect.addEventListener("change", () => {
                        // Clear the product name options
                        productNameSelect.innerHTML = "<option value=''>--Select--</option>";
                        // Get the selected product type
                        const selectedProductType = productTypeSelect.value;
                        // Add the product name options based on the selected product type
                        if (selectedProductType) {
                            Object.keys(products[selectedProductType]).forEach((productName) => {
                                const option = document.createElement("option");
                                option.value = productName;
                                option.innerText = productName;
                                productNameSelect.appendChild(option);
                            });
                        }
                        // Reset the stock input
                        productStockInput.value = "";
                    });

                    productNameSelect.addEventListener("change", () => {
                        // Get the selected product type and product name
                        const selectedProductType = productTypeSelect.value;
                        const selectedProductName = productNameSelect.value;
                        // Get the stock of the selected product
                        const selectedProductStock = products[selectedProductType][selectedProductName];
                        // Update the stock input with the selected product's stock
                        productStockInput.value = selectedProductStock;
                    });
                </script>

                <div class="demo-form-row">
                    <input name="add_record" type="submit" value="Add" class="demo-form-submit" style="border-radius: 6px">
                </div>
            </form>
        </div>
</body>

</section>

</html>