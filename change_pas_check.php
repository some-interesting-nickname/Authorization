<?php

    if($_GET["password"] != $_GET["confirm_password"]) {
        header('Location: http://127.0.0.2/forg_pas_ok.php'."?code=400");
        die();
    }




    $redis = new Redis();
    $redis->connect("127.0.0.1","6379");
    $login = htmlspecialchars($_GET["login"]);

    if(($redis->exists($login))) {
        $salt = $redis->hGet($login, "salt");
        $password = hash("sha256",htmlspecialchars($_GET["password"]).$salt);

        if($password == $redis->hGet($login, "password")){
            $redis->close();
            header('Location: http://127.0.0.2/change_pas.php'."?code=406");
            die();
        }

        $redis->hSet($login, "password", $password);
        $redis->close();
        header('Location: http://127.0.0.2/index.php?login='.$login);   //all OK
    } else {
        $redis->close();
        header('Location: http://127.0.0.2/change_pas.php'."?code=403&login=".$login);
        die();
    }