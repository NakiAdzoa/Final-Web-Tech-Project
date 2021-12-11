<?php

require_once "UcslDatabaseConnect.php";
$title = "Recollections";
include "header.php";
include "searchbar.php";

///session_start();
//if(!isset($_SESSION['gphonenumber']))
//{
//  die('Please log in first');
//}
//unset($_SESSION['gphonenumber']);

$sql = "SELECT * FROM recollection";
$result = $access->query($sql);

?>
    <link rel="stylesheet" href="viewinfo.css">

<table id="myTable">
<thead>
  <tr>
  <th>Form Serial Number</th>
    <th>Customer Name</th>
    <th>First Date of Installment</th>
    <th>Means</th>
    <th>Staff Name</th>
    <th>Amount Collected</th>
    <th>Amount Due</th>
    <th>Report</th>
    <th>GPS</th>
  </tr>
</thead>
<tbody>

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["formserialNumber"] . "</td>";
    echo "<td>" . $row["customerName"] . "</td>";
    echo "<td>" . $row["firstinstallmentDate"] . "</td>";
    echo "<td>" . $row["means"] . "</td>";
    echo "<td>" . $row["staffName"] . "</td>";
    echo "<td>" . $row["amountCollected"] . "</td>";
    echo "<td>" . $row["amountDue"] . "</td>";
    echo "<td>" . $row["report"] . "</td>";
    echo "<td>" . $row["GPS"] .  "</td>";
    echo "</tr>";
  }
} else {
  echo "0 results";
}
$access->close();
