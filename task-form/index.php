<?php
/**
 * Created by PhpStorm.
 * User: Dominik Grzelak
 * Date: 22.10.2017
 * Time: 12:12
 */
session_start();    // allows to use session variables

// checks if user is logged in
$loggedIn = false;
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    $loggedIn = true;
}

// if user is not logged in, redirect to login page
if ($loggedIn === false) {
    header("Location: login.php");
    exit(); // stops processing script immediately
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ćwiczenie dla aplikantów AKAI Backend #2">
    <title>Witamy w AKAI!</title>
</head>
<body>
<h1>Witamy w AKAI!</h1>
<img src="images/woohoo.jpg">
<br>
<a href="logout.php">Wyloguj</a>
</body>
</html>
