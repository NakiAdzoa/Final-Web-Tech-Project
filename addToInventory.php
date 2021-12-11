<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="addto.css">
</head>

<body>
    <div class="form-container">
        <h1 class="title">Please Fill All the Slots</h1>
        <form class="form-horizontal" method="POST" action="viewInventoryIndex.php">

            <div class="form-group">
                <label>Serial Number</label>
                <input type="text" class="form-control" name="serialN" id="serialN">
            </div>

            <div class="form-group">
                <label>Item Name</label>
                <input type="text" class="form-control" name="itemN" id="itemN">
            </div>

            <div class="form-group">
                <label>Supplier</label>
                <input type="text" class="form-control" name="supplier" id="supplier">
            </div>

            <div class="form-group">
                <label>Date Received</label>
                <input type="date" class="form-control" name="received" id="received">
            </div>

            <div class="form-group">
                <label>Brand</label>
                <input type="text" class="form-control" name="brand" id="brand">
            </div>

            <input name="add" type="submit" id="add" value="Submit">
            </form>
    </div>
</body>

</html>

<?php

require_once "UcslDatabaseConnect.php";

//session_start();
//if (!isset($_SESSION['ophonenumber'])) {
//  die('Please log in first');
//}
//unset($_SESSION['ophonenumber']);

if (isset($_POST['add'])) {

    $serialN = $_POST['serialN'];
    $itemN = $_POST['itemN'];
    $supplier = $_POST['supplier'];
    $date = $_POST['received'];
    $brand = $_POST['brand'];

    $sql = "INSERT INTO inventory (serialNumber, itemName, supplierName, dateReceived, brand) 
    VALUES ('$serialN', '$itemN', '$supplier', '$date', '$brand')";

    if ($access->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $access->error;
    }

    $access->close();
}

header("viewInventoryIndex.php");
?>