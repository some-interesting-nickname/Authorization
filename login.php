<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta charset=utf-8">
    <title>Authorization</title>
</head>
<body>
<p><b>Sign in</b></p>

<?php
    if(!empty($_COOKIE)) {

        $token = htmlspecialchars($_COOKIE["token"]);
        $redis = new Redis();
        $redis->connect("127.0.0.1","6379");
        $redis->select(1);

        if($redis->exists($token)){
            $login = $redis->get($token);
            header('Location: http://127.0.0.2/index.php?login='.$login);
            die();
        }
    }

    if(!empty($_GET)) {
        if ($_GET["code"] == 401)
            echo "<p style='color:#ff0000'>" ."Incorrect username or password"."</p>";
    }
?>

<form action='login_check.php?login="login"?password="password"' method="get">
    <div>
        <br><label for="login">Login</label>
        <input type="text" id="login" name="login">
        <br><br><label for="password">Password</label>
        <input type="password" id="password" name="password">
        <p><a href="forg_pas.php">Forgot password?</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit"></p>
    </div>
</form>
</body>