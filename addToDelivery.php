<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="addto.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1 class="title">Please Fill All the Slots</h1>
            <form class="form-horizontal" method="POST" action="viewDelivery.php">
                <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" class="form-control" name="serialN" id="serialN">
                </div>

                <div class="form-group">
                    <label>Form Serial Number</label>
                    <input type="text" class="form-control" name="formserialN" id="formserialN">
                </div>

                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" name="customer" id="customer">
                </div>

                <div class="form-group">
                    <label>location</label>
                    <input type="text" class="form-control" name="gps" id="gps">
                </div>

                <div class="form-group">
                    <label>First Installment Date</label>
                    <input type="date" class="form-control" name="firstinstall" id="firstinstall">
                </div>

                <input name="add" type="submit" id="add" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>

<?php

require_once "UcslDatabaseConnect.php";

//session_start();
//if (!isset($_SESSION['dphonenumber'])) {
//    die('Please log in first');
//}
//unset($_SESSION['dphonenumber']);

if (isset($_POST['add'])) {
    $serialN = $_POST['serialN'];
    $formserialN = $_POST['formserialN'];
    $customer = $_POST['customer'];
    $GPS = $_POST['gps'];
    $date = $_POST['firstinstall'];

    $sql = "INSERT INTO delivery (serialNumber, formserialNumber, customerName, GPS, firstinstallmentDate)
    VALUES ('$serialN', '$formserialN', '$customer', '$GPS', '$date')";

    if ($access->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $access->error;
    }

    $access->close();
}
?>