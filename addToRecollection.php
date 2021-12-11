

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
            <form class="form-horizontal" method="POST" action="viewRecollection.php">
                <div class="form-group">
                    <label>Form Serial Number</label>
                    <input type="text" class="form-control" name="formserialNum" id="formserialNum">
                </div>

                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" name="customer" id="customer">
                </div>

                <div class="form-group">
                    <label>First Installment Date</label>
                    <input type="date" class="form-control" name="firstinstall" id="firstinstall">
                </div>

                <div class="form-group">
                    <label>Means</label>
                    <select name="means" class="form-control" id="means">
                        <option value="cash">Cash</option>
                        <option value="mobile money">Mobile Money</option>
                        <option value="post-dated Cheques">Post-dated Cheques</option>
                </div>

                <div class="form-group">
                    <label>Staff Name</label>
                    <input type="text" class="form-control" name="staff" id="staff">
                </div>

                <div class="form-group">
                    <label>Amount Collected</label>
                    <input type="number" class="form-control" name="collected" id="collected">
                </div>

                <div class="form-group">
                    <label>Amount Due</label>
                    <input type="number" class="form-control" name="due" id="due">
                </div>

                <div class="form-group">
                    <label>Report</label>
                    <select name="report" class="form-control" id="report">
                        <option value="defaulting">Defaulting</option>
                        <option value="ontime">On Time</option>
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="gps" id="gps">
                </div>
                <input name="add" type="submit" id="add" value="Submit">
        </div>
    </div>
</div>

</form>
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
    $formserialN = $_POST['formserialN'];
    $customer = $_POST['customer'];
    $date = $_POST['firstinstall'];
    $means = $_POST['means'];
    $staff = $_POST['staff'];
    $collected = $_POST['collected'];
    $due = $_POST['due'];
    $report = $_POST['report'];
    $GPS = $_POST['gps'];

    $sql = "INSERT INTO recollection (formserialNumber, customerName, firstinstallmentDate, means, staffName, amountCollected, amountDue, report, GPS)
    VALUES ('$formserialN', '$customer', '$date', '$means','$staff', '$collected', '$due','$report', '$GPS')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("viewRecollection.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
