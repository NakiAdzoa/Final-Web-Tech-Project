<html>

    <title><?php echo $title; ?></title>

    <style>
.topnav {
  background-color: #008000;
  overflow: hidden;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  font-family: "Futura", "Trebuchet MS", Arial, sans-serif;
  padding: 12px 14px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #b3b300;
  color: black;
}

.topnav a.active {
  background-color: #001a00;
  color: white;
}

.previous {
  background-color: #008000;
  color: black;
}

.logOut {
  background-color: #008000;
  margin-left: 900px;
  color: black;
}
    </style>

<body>
<div class="topnav">
  <a class="active" href="#home"><?php echo $title; ?></a>
  <a class="previous" href="UserSelection.php">&laquo; Previous</a>
  <a class="logOut" href="logout.php">Log Out</a>
</div>
</body>

</html>

