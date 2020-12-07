<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>

<p><b>Sign up</b></p>
<?php
if(!empty($_GET)) {
    if ($_GET["code"] == 403) {
        if(isset($_GET['login'])) {
            $tmp = htmlspecialchars($_GET["login"]);
            echo "<p style='color:#ff0000'>" . "Username ".$tmp." is not available." . "</p>";
        }
    }
    if ($_GET["code"] == 400)
        echo "<p style='color:#ff0000'>" ."Passwords are not identical"."</p>";

}
?>
<form action='register_check.php?login="login"?password="password"?confirm_password="confirm_password"?food="food"' method="get">
    <div>
        <br><label for="login">Login</label>
        <input type="text" id="login" name="login">
        <br><br><label for="password">Password</label>
        <input type="password" id="password" name="password">
        <br><br><label for="confirm_password">Confirm password</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <br><br><label for="food">Favorite food</label>
        <input type="text" id="food" name="food">
        <p><a href="login.php">Sign in</a>&nbsp;&nbsp;&nbsp;&nbsp;	<input type="submit"></p>
    </div>
</form>
</body>
</html>