<?php

    $arr  = json_decode(file_get_contents('config.json'),1);
    var_dump($arr);
    return $arr;