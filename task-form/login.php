<?php
/**
 * Created by PhpStorm.
 * User: Dominik Grzelak
 * Date: 22.10.2017
 * Time: 11:11
 */
session_start();    // allows to use session variables

/*
 * define $passwordHashed here
 */
define("USERNAME", "test"); // never store sensitive data like this, it's just to simplify code for our needs
define("PASSWORD", $passwordHashed);    // it's a form of storing constant data in PHP

/*
 * in this place, redirect user if he or she is already logged in
 */

// if user has used login form
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // getting data entered by user and shortening variables' names
    $usernameEntered = $_POST['username'];
    /*
     * create new variable for password here
     */

    /*
     * check if passwords match here
     */

    /*
     * here include what to do when data is correct or incorrect
     */
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ćwiczenie dla aplikantów AKAI Backend #2">
    <title>Formularz logowania</title>
</head>
<body>
<div>
<?php if (isset($error)) {
    echo $error;
} ?>
</div>
<form action="" method="post">
    <label>
        Login:
        <input type="text" name="username">
    </label><br>
    <label>
        Hasło:
        <input type="password" name="password">
    </label><br>
    <input type="submit" value="Login">
</form>
</body>
</html>
