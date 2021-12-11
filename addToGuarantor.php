
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="addto.css">
</head>

<body>
        <div class="form-container">
            <h1 class="title">Please Fill All the Slots</h1>
            <form class="form-horizontal" method="POST" action="viewGuarantor.php">
                <div class="form-group">
                    <label>Form Serial Number</label>
                    <input type="text" class="form-control" name="formserialN" id="formserialN">
                </div>
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" name="customer" id="customer">
                </div>

                <div class="form-group">
                    <label>Guarantor</label>
                    <td><input type="text" class="form-control" name="guarantor" id="guarantor">
                </div>

                <div class="form-group">
                    <label>GPS</label>
                    <input type="text" class="form-control" name="gps" id="gps">
                </div>

                <div class="form-group">
                    <label>Relationship with Customer</label>
                    <select name="relationship" class="form-control" id="relationship">
                        <option value="family">Family</option>
                        <option value="friend">Friend</option>
                        <option value="collegue">collegue</option>
                </div>

                <div class="form-group">
                    <label>Guarantor Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="denied">Denied</option>
                        <option value="confirmed">Confirmed</option>
                </div>
                <input name="add" type="submit" id="add" value="Submit">
        </div>
    </div>
    </form>
</body>

</html>

<?php

require_once "UcslDatabaseConnect.php";

//session_start();
//if (!isset($_SESSION['mphonenumber'])) {
//    die('Please log in first');
//}
//unset($_SESSION['mphonenumber']);


if (isset($_POST['add'])) {
    $formserialN = $_POST['formserialN'];
    $customer = $_POST['customer'];
    $guarantor = $_POST['guarantor'];
    $number = $_POST['number'];
    $gps = $_POST['gps'];
    $relationship = $_POST['relationship'];
    $status = $_POST['status'];

    $sql = "INSERT INTO guarantor (forserialNumber, customerName, guarantorName, phoneNumber, GPS, customerRelationship, guarantorStatus)
VALUES ('$formseialN', '$customer', '$number', '$gps', '$relationship','$status')";

    if ($access->query($sql) === TRUE) {
        echo "New record created successfully";
        include "viewGuarantor.php";
    } else {
        echo "Error: " . $sql . "<br>" . $access->error;

    }

    $access->close();
}
?>
