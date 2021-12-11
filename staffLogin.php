<?php

// Initialize the session
session_start();

// Include connection file
require_once "databaseConnect.php";

// Define variables and initialize with empty values
$phonenumber = $password = "";
$phonenumber_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if first slot is empty
    if (empty(trim($_POST["phonenumber"]))) {
        $phonenumber_err = "Please enter phonenumber.";
    } else {
        $phonenumber = trim($_POST["phonenumber"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($phonenumber_err) && empty($password_err)) {
        // Prepare a select statement
        $query = "SELECT phoneNumber, assignedPassword FROM staff WHERE phoneNumber = ? AND assignedPassword =  ?";

        if ($stmt = $connect->prepare($query)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('ss', $phonenumber, $password);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if user exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($phonenumber, $password);
                    if ($stmt->fetch()) {
                        // Password is correct, so start a new session
                        session_start();

                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["phonenumber"] = $phonenumber;
                        $_SESSION["password"] = $password;

                        // Redirect user to welcome page
                        header("location: UserSelection.php");
                    } else {
                        $login_err = "Invalid phone number and password.";
                    }
                }
            } else {
                // Username doesn't exist, display an error message
                $login_err = "Invalid phone number and password.";
            }
            // Close statement
            $stmt->close();
        }
    }    
// Close connection
$connect->close();

}
?>