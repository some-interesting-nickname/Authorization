<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot password</title>
</head>
<body>

<p><b>Change password</b></p>

<?php
if(!empty($_GET)) {
    if ($_GET["code"] == 403) {
        if(isset($_GET['login'])) {
            $tmp = htmlspecialchars($_GET["login"]);
            echo "<p style='color:#ff0000'>" . "Wrong username." . "</p>";
        }
    }
    if ($_GET["code"] == 400)
        echo "<p style='color:#ff0000'>" ."Passwords are not identical."."</p>";
    if ($_GET["code"] == 401)
        echo "<p style='color:#ff0000'>" ."Your password has expired."."</p>";
    if ($_GET["code"] == 406)
        echo "<p style='color:#ff0000'>" ."New password must be different from current."."</p>";
}
?>
<form action='change_pas_check.php?login="login"?password="password"' method="get">
    <div>
        <br><label for="login">Login</label>
        <input type="text" id="login" name="login">
        <br><br><label for="password">New password</label>
        <input type="password" id="password" name="password">
        <br><br><label for="confirm_password">Confirm password</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <p><input type="submit"></p>
    </div>

</body>
</html>