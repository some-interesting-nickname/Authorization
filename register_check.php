
<?php

    if($_GET["password"] != $_GET["confirm_password"]) {
        header('Location: http://127.0.0.2/register.php'."?code=400");
        die();
    }

    $redis = new Redis();
    $redis->connect("127.0.0.1","6379");
    $login = htmlspecialchars($_GET["login"]);
    if(!($redis->exists($login))) {
        $min = PHP_INT_MIN;
        $max = PHP_INT_MAX;
        $salt = random_int($min, $max);
        $password = hash("sha256",htmlspecialchars($_GET["password"]).$salt);
        $food = hash("sha256",htmlspecialchars($_GET["food"]).$salt);
        $tmp_array = array (
            "password" => $password,
            "food" => $food,
            "salt" => $salt,
            "password_expires" => time()+120
        );
        $redis->hMSet($login, $tmp_array);
        $redis->close();
        header('Location: http://127.0.0.2/login.php');   //all OK
    } else {
        $redis->close();
        header('Location: http://127.0.0.2/register.php'."?code=403&login=".$login);
        die();
    }

