
<?php
/**
 * Created by PhpStorm.
 * User: lex
 * Date: 3/20/17
 * Time: 15:03
 */

if ( isset( $_GET['email'] ) && !empty( $_GET['email'] ) && filter_var( $_GET['email'], FILTER_VALIDATE_EMAIL ) ) {
    if ( isset($_GET['password']) && !empty($_GET['password']) ) {
        $messageLogin = "Succesfully logged in";
    } else {
        $messageLogin = "This isn't a valid password";
    }
} else {
    $messageLogin = "This isn't a valid email.";
}

header("Location: ../index.php?messageLogin=$messageLogin");
exit();

