<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="addto.css">
</head>

<body>
    <div class="form-container">
        <h1 class="title">Please Fill All the Slots</h1>
        <form class="form-horizontal" method="POST" action="">
            <div class="form-group">
                <label>Form Serial Number</label>
                <input type="text" class="form-control" name="formserialNum" id="formserialNum">
            </div>

            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" class="form-control" name="customer" id="customer">
            </div>

            <div class="form-group">
                <label>Contact</label>
                <input type="number" class="form-control" name="contact" id="contact">
            </div>

            <div class="form-group">
                <label>Hire Purchase Price</label>
                <input type="number" class="form-control" name="hpPrice" id="hpPrice">
            </div>

            <div class="form-group">
                <label>Installment Duration</label>
                <input type="text" class="form-control" name="install" id="install">
            </div>

            <div class="form-group">
                <label>Serial Number</label>
                <input type="text" class="form-control" name="serialNum" id="serialNum">
            </div>

            <div class="form-group">
                <label>Customer Type</label>
                <select name="type" class="form-control" id="type">
                    <option value="new">New</option>
                    <option value="existing">Existing</option>
            </div>

        <input name="add" type="submit" id="add" value="Add Customer" href="viewCustomers.php" >
        </form>
    </div>

</body>

</html>

<?php

require_once "UcslDatabaseConnect.php";

//session_start();
//if (!isset($_SESSION['mphonenumber'])) {
//  die('Please log in first');
//}
//unset($_SESSION['mphonenumber']);

if (isset($_POST['add'])) {

    $formserialNum = $_POST['formserialNum'];
    $customer = $_POST['customer'];
    $contact = $_POST['contact'];
    $hpprice = $_POST['hpPrice'];
    $install = $_POST['install'];
    $serialNum = $_POST['serialNum'];
    $type = $_POST['type'];

    $sql = "INSERT INTO customer (formserialNumber, customerName, contact, hirepurchasePrice, installmentDuration, serialNumber, customerType)
    VALUES ('$formserialNum','$customer','$contact','$hpprice','$install','$serialNum','$type')";

    if ($access->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $access->error;
    }
    $access->close();
}

header("viewCustomers.php");
?>