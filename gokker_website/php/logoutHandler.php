<?php

session_start();

/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 3/20/17
 * Time: 16:50
 */

session_unset();
session_destroy();

header("Location: ../index.php");
exit();