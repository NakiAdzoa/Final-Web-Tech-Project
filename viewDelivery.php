<?php

require_once "UcslDatabaseConnect.php";
$title = "Deliveries";
include "header.php";
include "searchbar.php";

//session_start();
//if(!isset($_SESSION['tphonenumber']))
//{
//  die('Please log in first');
//}
//unset($_SESSION['tphonenumber']);

$sql = "SELECT * FROM delivery";
$result = $access->query($sql);
?>
<link rel="stylesheet" href="viewinfo.css">

<table id="myTable">
  <thead>
    <tr>
      <th>Serial Number</th>
      <th>Form Serial Number</th>
      <th>Customer Name</th>
      <th>GPS</th>
      <th>Installment Duration</th>

    </tr>
  </thead>
  <tbody>

    <?php

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["serialNumber"] . "</td>";
       echo "<td>" . $row["formserialNumber"] . "</td>";
       echo "<td>" . $row["customerName"] . "</td>";
        echo "<td>" . $row["GPS"] . "</td>";
        echo "<td>" . $row["firstinstallmentDate"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "0 results";
    }
    $access->close();
    ?>