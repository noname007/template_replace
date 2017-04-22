<?php
    function convert_json(){

        global $opt;
        global $json_file;
        // var_dump($a);

        // var_dump($opt);
        // echo rtrim(CONFIG_VAR,':');
        // echo rtrim(template,':');
        // return;


        if(!isset($opt[$json_file]))
        {
            echo  'not found json file',PHP_EOL,'usage: php convert.php  --template 1.yml --var json_type.php --json config.json',PHP_EOL;
            exit(1);
        }
        $arr  = json_decode(file_get_contents($opt[$json_file]),1);
        var_dump($arr);
        return $arr;
    }
        
    return convert_json();