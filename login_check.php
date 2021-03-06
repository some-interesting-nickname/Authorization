<?php
    const TOKEN_LIFE = 'time()+3600';

    $redis = new Redis();
    $redis->connect("127.0.0.1","6379");
    $login = htmlspecialchars($_GET["login"]);

    if($redis->exists($login)) {
        $password = $redis->hGet($login, "password");
        $salt = $redis->hGet($login, "salt");
        if($redis->hGet($login, "password_expires") < time()) {
            $redis->close();
            header('Location: http://127.0.0.2/change_pas.php?code=401');
            die();
            
        }


        if($password == hash("sha256",htmlspecialchars($_GET["password"]).$salt)){
            $token = random_int(PHP_INT_MIN, PHP_INT_MAX);
            $redis->select(1);
            $redis->set($token, $login);
            $redis->expire($token, (int)TOKEN_LIFE);     //time the token expires
            setcookie("token", $token, (int)TOKEN_LIFE);
            $redis->close();
            header('Location: http://127.0.0.2/index.php?login='.$login);
            die();
        } else {
            $redis->close();
            header('Location: http://127.0.0.2/login.php'."?code=401");
            die();
        }
    }   else {
        $redis->close();
        header('Location: http://127.0.0.2/login.php'."?code=401");
        die();
    }

