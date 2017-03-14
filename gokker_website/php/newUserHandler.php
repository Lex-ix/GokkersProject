<?php
if (isset($_GET['email']) && !empty($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) && isset($_GET['password']) && !empty($_GET['password']) ) {
    $userEmail =    $_GET['email'];
    $userPassword = $_GET['password'];

    $dbUser = 'root';
    $dbPassword = '';
    $dbHostname = 'localhost';
    $dbName = 'gokkers';

    $dbHandle = new mysqli($dbHostname, $dbUser, $dbPassword, $dbName) or die('Unable to connect to MySQL');
    echo 'connected to MySQL';

    $selected = mysqli_select_db($dbHandle, $dbName) or die("Could not select examples");

    $querry = "INSERT INTO users(password, email) VALUES ('$userPassword','$userEmail')";
    $result = mysqli_query($dbHandle, $querry);

    if (!$result) {
        $message = 'Invalid query: ' . "\n";
        $message .= 'Whole querry: ' . $querry;
    }

    $message = 'You succesfully created an account.';
}
else {
    $message = 'Please verify if you entered a proper email and/or password.';
}

header("Location: ../index.php?message=$message");
exit();