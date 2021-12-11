

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="addto.css">
</head>

<div class="container">
    <div class="form-container">
        <h1 class="title">Please Fill All the Slots</h1>
        <form class="form-horizontal" method="POST" action="viewPricelistIndex.php">
            <div class="form-group">
                <label>Serial Number</label>
                <input type="text" class="form-control" name="serialN" id="serialN">
            </div>

            <div class="form-group">
                <label>Cash Price</label>
                <input type="number" name="cashP" id="cashP">
            </div>

            <div class="form-group">
                <label>Two Months</label>
                <input type="number" name="twoM" id="twoM">
            </div>
            <div class="form-group">
                <label>Three Months</label>
                <input type="number" name="threeM" id="threeM">
            </div>
            <div class="form-group">
                <label>Four Months</label>
                <input type="number" name="fourM" id="fourM">
            </div>
            <div class="form-group">
                <label>Five Months</label>
                <input type="number" name="fiveM" id="twoM">
            </div>
            <div class="form-group">
                <label>Six Months</label>
                <input type="number" name="sixM" id="sixM">
            </div>
            <div class="form-group">
                <label>Seven Months</label>
                <input type="number" name="sevenM" id="sevenM">
            </div>
            <div class="form-group">
                <label>Eight Months</label>
                <input type="number" name="eightM" id="eightM">
            </div>
            <div class="form-group">
                <label>Nine Months</label>
                <input type="number" name="nineM" id="nineM">
            </div>
            <div class="form-group">
                <label>Ten Months</label>
                <input type="number" name="tenM" id="tenM">
            </div>
            <div class="form-group">
                <label>Eleven Months</label>
                <input type="number" name="elevenM" id="elevenM">
            </div>
            <div class="form-group">
                <label>Twelve Months</label>
                <input type="number" name="twelveM" id="twelveM">
            </div>
            <input name="add" type="submit" id="add" value="Submit">
    </div>
    </form>
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
    $cash = $_POST['cashP'];
    $two = $_POST['twoM'];
    $three = $_POST['threeM'];
    $four = $_POST['fourM'];
    $five = $_POST['fiveM'];
    $six = $_POST['sixM'];
    $seven = $_POST['sevenM'];
    $eight = $_POST['eightM'];
    $nine = $_POST['nineM'];
    $ten = $_POST['tenM'];
    $eleven = $_POST['elevenM'];
    $twelve = $_POST['twelveM'];

    $sql = "INSERT INTO pricelist (serialNumber, cashPrice, twoMonths, threeMonths, fourMonths, fiveMonths, sixMonths, sevenMonths, eightMonths, nineMonths, tenMonths, elevenMonths, twelveMonths)
    VALUES ('$serialN', '$cash', '$two', '$three', '$four', '$five', '$six', '$seven', '$eight', '$nine', '$ten', '$eleven', '$twelve')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("viewPricelist.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>