<?php 

require_once "UcslDatabaseConnect.php";
$title = "Location";
include "header.php";
include "searchbar.php";

    //session_start();
    //if(!isset($_SESSION['tphonenumber']))
    //{
     //   die('Please log in first');
    //}
    //unset($_SESSION['tphonenumber']);

    $sql = "SELECT * FROM Location";
$result = $access->query($sql);
?>
    <link rel="stylesheet" href="viewinfo.css">

<table id="myTable">
<thead>
  <tr>
  <th>GPS</th>
    <th>Zone</th>
    <th>Town</th>
    <th>Landmark</th>
  </tr>
</thead>
<tbody>

<?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>". $row["GPS"]. "</td>";
    echo "<td>". $row["zone"]. "</td>";
    echo "<td>". $row["town"]. "</td>"; 
    echo "<td>". $row["landmark"]. "</td>"; 
    echo "</tr>";
  }
} else {
  echo "0 results";
}
$access->close();
?>

