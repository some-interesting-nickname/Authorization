<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot password</title>
</head>
<body>
<?php
    if(!empty($_GET)) {

        if ($_GET["code"] == 400)
            echo "<p style='color:#ff0000'>" ."Wrong food"."</p>";
        if ($_GET["code"] == 401)
            echo "<p style='color:#ff0000'>" ."Incorrect username"."</p>";
    }
?>
<form action='forg_pas_check.php?login="login"?food="food"' method="get">
    <div>
        <br><label for="login">Login</label>
        <input type="text" id="login" name="login">
        <br><br><label for="food">Favorite food</label>
        <input type="text" id="food" name="food">
        <p><input type="submit"></p>
    </div>

</body>
</html>



