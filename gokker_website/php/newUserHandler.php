<?php
if (isset($_GET['email']) && !empty($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) && isset($_GET['password']) && !empty($_GET['password']) ) {
    $userEmail    = $_GET['email'];
    $userPassword = $_GET['password'];

    $dbUser = 'root';
    $dbPassword = '';
    $dbHostname = 'localhost';
    $dbName = 'gokkers';

    $dbHandle = new mysqli($dbHostname, $dbUser, $dbPassword, $dbName) or die($message = "Unable to connect to the MySQL database.");

    $selected = mysqli_select_db($dbHandle, $dbName) or die("Could not select examples");

    $querry = "SELECT * FROM users WHERE email='$userEmail'";
    mysqli_query($dbHandle, $querry);

    if ( mysqli_affected_rows($dbHandle) > 0 ) {
        $message = "This email is already taken ($userEmail)";
    }
    else {
        $querry = "INSERT INTO users(password, email) VALUES ('$userPassword','$userEmail')";
        mysqli_query($dbHandle, $querry);

        $message = 'You succesfully created an account.';
    }

}
else {
    $message = 'Please verify if you entered a proper email and/or password.';
}

header("Location: ../index.php?message=$message");
exit();