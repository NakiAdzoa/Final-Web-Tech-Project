<?php
require "staffLogin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="loginpage.css">
</head>

<body>
    <div class="boxOne">
    </div>

    <img src="cssimages\logo.png" alt="Company Logo"/>

    <p1><strong>SIGN IN with your COMPANY ISSUED PHONE NUMBER and your SET PASSWORD</strong></p1>

    <?php
    if (!empty($login_err)) {
        echo '<div class="alert alert-danger fade in">' . $login_err . '</div>';
    }
    ?>

    <form action="staffLogin.php" method="POST">

        <div class="boxTwo">

            <div class="label1">
            <div class="form-group">
                <label for="phonenumber">PHONE NUMBER</label>
                <input type="text" id="phonenumber" name="phonenumber" class="form-control <?php echo (!empty($phonenumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phonenumber; ?>">
                <span class="invalid-feedback"><?php echo $phonenumber_err; ?></span>
            </div>
            </div>

            <div class="label2">
            <div class="form-group">
                <label for="passsword">PASSWORD</label>
                <input type="password" id="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phonenumber; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

            <div>
            <button type="submit" id="logIn" class="btn btn-primary">LOG IN</button>
        </div>
    </form>

</body>

</html>