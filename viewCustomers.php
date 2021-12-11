<?php

require_once "UcslDatabaseConnect.php";
$title = "Customers";
include "header.php";
include "searchbar.php";

//session_start();
//if(!isset($_SESSION['dphonenumber']))
//{
//  die('Please log in first');
//}
//unset($_SESSION['dphonenumber']);

$sql = "SELECT * FROM customer";
$result = $access->query($sql);
?>

<!DOCTYPE html>

<html>

<head>
  <link rel="stylesheet" href="viewinfo.css">
</head>

<body>
  <table id="myTable">
    <thead>
      <tr>
        <th>Form Serial Number</th>
        <th>Customer Name</th>
        <th>Phone Number</th>
        <th>Hire Purchase Price</th>
        <th>Installment Duration</th>
        <th>Serial Number</th>
        <th>Customer Type</th>
      </tr>

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["formserialNumber"] . "</td>";
    echo "<td>" . $row["customerName"] . "</td>";
    echo "<td>" . $row["contact"] . "</td>";
    echo "<td> " . $row["hirepurchasePrice"] . "</td>";
    echo "<td>" . $row["installmentDuration"] . "</td>";
    echo "<td>" . $row["serialNumber"] . "</td>";
    echo "<td>" . $row["customerType"] . "</td>";

    echo "</tr>";
  }
} else {
  echo "0 results";
}
$access->close();
?>
    </thead>
    <tbody>
      
  </table>
</body>

</html>
