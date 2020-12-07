<?php

    $redis = new Redis();
    $redis->connect("127.0.0.1","6379");
    $login = htmlspecialchars($_GET["login"]);

    if($redis->exists($login)) {
        $food = $redis->hGet($login, "food");
        $salt = $redis->hGet($login, "salt");
        $redis->close();

        if($food == hash("sha256",htmlspecialchars($_GET["food"]).$salt)) {

            header('Location: http://127.0.0.2/change_pas.php');
            die();

        } else {

            header('Location: http://127.0.0.2/forg_pas.php?code=400');
            die();

        }
    } else {

        $redis->close();
        header('Location: http://127.0.0.2/forg_pas.php?code=401');
        die();

    }
