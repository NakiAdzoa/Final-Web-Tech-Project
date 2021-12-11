<?php 

require_once "UcslDatabaseConnect.php";
$title = "Guarantors";
include "header.php";
include "searchbar.php";

    //session_start();
    //if(!isset($_SESSION['dphonenumber']))
    //{
      //  die('Please log in first');
    //}
    //unset($_SESSION['dphonenumber']);

    $sql = "SELECT * FROM guarantor";
$result = $access->query($sql);

?>
    <link rel="stylesheet" href="viewinfo.css">

    <table id="myTable">
<thead>
  <tr>
  <th>Form Serial Number</th>
    <th>Customer Name</th>
    <th>Guarantor Name</th>
    <th>Phone Number</th>
    <th>GPS</th>
    <th>Relationship with Customer</th>
    <th>Guarantor Status</th>

  </tr>
</thead>
<tbody>

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["formserialNumber"]. "</td>";
    echo "<td>". $row["customerName"]. "</td>";
    echo "<td>" . $row["guarantorName"]. "</td>";
    echo "<td>" . $row["phoneNumber"]. "</td>";
    echo "<td>" . $row["GPS"]. "</td>";
    echo "<td>" . $row["customerRelationship"]. "</td>";
    echo "<td>" . $row["guarantorStatus"]. "</td>";
    echo "</tr>";
  }
} else {
  echo "0 results";
}
$access->close();
?>

