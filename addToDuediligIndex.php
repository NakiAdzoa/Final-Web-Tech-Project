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
      <form class="form-horizontal" method="POST" action="viewDuediligIndex.php">
        <div class="form-group">
          <label>Customer Name</label>
          <input type="text" name="customer" id="customer">
        </div>

        <div class="form-group">
          <label>Contract Status</label>
          <select name="status" id="status">
            <option value="accepted">Accepted</option>
            <option value="rejected">Rejected</option>
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
  $customer = $_POST['customer'];
  $cstatus = $_POST['contractStatus'];

  $sql = "INSERT INTO ddstageIi_index (customerName, contractStatus)
  VALUES ('$customer', '$cstatus')";

  if ($access->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $access->error;
  }
  $access->close();
}
?>