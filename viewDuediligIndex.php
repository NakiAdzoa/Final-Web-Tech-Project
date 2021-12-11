<?php 

require_once "UcslDatabaseConnect.php";
$title = "Due Diligence Index";
include "header.php";
include "searchbar.php";

    //session_start();
    //if(!isset($_SESSION['gphonenumber']))
    //{
      //  die('Please log in first');
    //}
    //unset($_SESSION['gphonenumber']);

    
//session_start();
//if (!isset($_SESSION['tphonenumber'])) {
  //  die('Please log in first');
//}
//unset($_SESSION['tphonenumber']);

    $sql = "SELECT customerName, contractStatus FROM duediligenge_stageii";
$result = $access->query($sql);
?>

<link rel="stylesheet" href="viewinfo.css">

<table id="myTable">
<thead>
  <tr>
  <th>Customer Name</th>
    <th>Contract Status</th>

  </tr>
</thead>
<tbody>

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["customerName"]. "</td>";
    echo "<td>". $row["contractStatus"]. "</td>";
    echo "</tr>";
  }
} else {
  echo "0 results";
}
$access->close();
?>

