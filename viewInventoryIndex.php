<?php

require_once "UcslDatabaseConnect.php";
$title = "Inventory Index";
include "header.php";
include "searchbar.php";

//    session_start();
//  if(!isset($_SESSION['ophonenumber']))
//{
//  die('Please log in first');
//}
//unset($_SESSION['ophonenumber']);

$sql = "SELECT supplierName, dateReceived, itemName FROM inventory";
$result = $access->query($sql);
?>
    <link rel="stylesheet" href="viewinfo.css">

<table id="myTable">
<thead>
  <tr>
  <th>Supplier Name</th>
    <th>Item Received</th>
    <th>Date Received</th>

  </tr>
</thead>
<tbody>

<?php

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["supplierName"] . "</td>";
    echo "<td>". $row["itemName"] . "</td>";
    echo "<td>". $row["dateReceived"] . "</td>";

    echo "</tr>";
  }
} else {
  echo "0 results";
}

$access->close();
