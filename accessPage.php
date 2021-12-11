<?php

if (!isset($_POST['logIn'])) {
?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <input type="text" name="phonenumber" id="phonenumber" class="form-control input-lg" placeholder="PHONENUMBER" tabindex="3">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="PASSWORD" tabindex="5">
        </div>

        <br /> <br /><input type="submit" name="submit" class="btn btn-success btn-block btn-lg" value="Verfiy" />
    </form>

<?php

    require_once("databaseConnect.php");

    session_start();

    $gphonenumber = $_POST['phonenumber'];
    $gpassword = $_POST['password'];

    $ophonenumber = $_POST['phonenumber'];
    $opassword = $_POST['password'];

    $dphonenumber = $_POST['phonenumber'];
    $dpassword = $_POST['password'];

    $tphonenumber = $_POST['phonenumber'];
    $tpassword = $_POST['password'];

    $mphonenumber = $_POST['phonenumber'];
    $mpassword = $_POST['password'];


    $sql = "SELECT phoneNumber, assignedPassword from generalmanagers WHERE assignedPassword LIKE '{$gpassword}' LIMIT 1";
    $result = $connect->query($sql);
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
    } else {
        $_SESSION['gphonenumber'] = $gphonenumber;
        header('location:test.php');
    }

    $sql = "SELECT phoneNumber, assignedPassword from operationmanagers WHERE assignedPassword LIKE '{$opassword}' LIMIT 1";
    $result = $connect->query($sql);
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
    } else {
        $_SESSION['ophonenumber'] = $ophonenumber;
        header('location:test.php');
    }

    $sql = "SELECT phoneNumber, assignedPassword from marketers WHERE assignedPassword LIKE '{$dpassword}' LIMIT 1";
    $result = $connect->query($sql);
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
    } else {
        $_SESSION['dphonenumber'] = $dphonenumber;
        header('location:test.php');
    }

    $sql = "SELECT phoneNumber, assignedPassword from duediligenceteam WHERE assignedPassword LIKE '{$tpassword}' LIMIT 1";
    $result = $connect->query($sql);
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
    } else {
        $_SESSION['tphonenumber'] = $tphonenumber;
        header('location:test.php');
    }

    $sql = "SELECT phoneNumber, assignedPassword from deliveryteam WHERE assignedPassword LIKE '{$mpassword}' LIMIT 1";
    $result = $connect->query($sql);
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
    } else {
        $_SESSION['mphonenumber'] = $mphonenumber;
        header('location:test.php');
    }
}
