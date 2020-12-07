<?php

$redis = new Redis();
$redis->connect("127.0.0.1","6379"); //IP and port set by php client
//Store a value
$redis->set("say","Hello World");
echo $redis->get("say"); //Hello World should be output

//Store multiple values
$array = array('first_key'=>'first_val',
    'second_key'=>'second_val',
    'third_key'=>'third_val');
$array_get = array('first_key','second_key','third_key');
$redis->mset($array);
var_dump($redis->mget($array_get));