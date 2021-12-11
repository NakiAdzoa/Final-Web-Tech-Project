<?php 

require_once "UcslDatabaseConnect.php";
$title = "Pricelist Index";
include "header.php";
include "searchbar.php";

    //session_start();
    //if(!isset($_SESSION['mphonenumber']))
    //{
     //   die('Please log in first');
    //}
    //unset($_SESSION['mphonenumber']);

  $sql = "SELECT serialNumber, cashPrice, threeMonths, sixMonths, nineMonths, twelveMonths FROM pricelist";
$result = $access->query($sql);
?>
    <link rel="stylesheet" href="viewinfo.css">

<table id="myTable">
<thead>
  <tr>
  <th>Serial Number</th>
    <th>Cash Price</th>
    <th>Three Months</th>
    <th>Six Months</th>
    <th>Nine Months</th>
    <th>Twelve Months</th>

  </tr>
</thead>
<tbody>

<?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo"<td>". $row["serialNumber"]. "</td>"; 
     echo"<td>". $row["cashPrice"].  "</td>";
     echo"<td>".$row["threeMonths"].  "</td>";
     echo"<td>". $row["sixMonths"].  "</td>";
     echo"<td>".$row["nineMonths"].  "</td>";
    echo "<td>" . $row["twelveMonths"].  "</td>";
    echo  "</tr>";
  }
} else {
  echo "0 results";
}
$access->close();
?>

