#! /bin/env php
<?php
//
const template  = 'template:';
const CONFIG_VAR = 'var:';
const OUTPUT_FILE = 'output:';
const CONFIG_TYPE = 'type:';

$config_type = rtrim(CONFIG_TYPE,':');
$template_key = rtrim(template,':');
$config_var_key = rtrim(CONFIG_VAR,':');
$output_file = rtrim(OUTPUT_FILE,':');

$opt = getopt('',[template,CONFIG_VAR,OUTPUT_FILE,CONFIG_TYPE]);
// var_dump($a);

// var_dump($opt);
// echo rtrim(CONFIG_VAR,':');
// echo rtrim(template,':');
// return;


if(!isset($opt[$template_key],$opt[$config_var_key]))
{
	echo  'php convert.php  --template 1.yml --var c.php [--output output.yml]',PHP_EOL;
	exit(1);
}

if(!is_file($opt[$config_var_key]))
{
    echo 'file "' ,$opt[$config_var_key],'" not exist;',PHP_EOL;
    exit(1);
}

if(!is_file($opt[$template_key]))
{
    echo 'file "' ,$opt[$template_key],'" not exist;',PHP_EOL;
    exit(1);
}

if(isset($opt[$config_type])){
    switch($opt[$config_type])
    {
        case 'json':
            $config = convert_json($opt[$config_var_key]);
            break;
        default:
            exit(1);
            break;
    }
}else{
    $config =  require $opt[$config_var_key];
}

$res = file_get_contents($opt[$template_key]) ;

$output =  preg_replace_callback('/\${\s*([0-9a-zA-Z._]+)\s*}/',function ($matchs)use($config){
//    var_dump($matchs,$config);
    if (isset($config[$matchs[1]])){
        return $config[$matchs[1]];
    } else {
        echo ' [Warning] config "',$matchs[1],'" not found in config file',PHP_EOL;
        return '';
    };
},$res);

//echo $res;
$file_name = isset($opt[$output_file])?$opt[$output_file]: $opt[$template_key].$opt[$config_var_key].'txt';

if(is_file($file_name))
{
    echo " [Warning] ",'override the file "',$file_name,'"',PHP_EOL;
}

file_put_contents($file_name, $output);


function convert_json($json_file){
        $arr  = json_decode(file_get_contents($json_file),1);
        return $arr;
}
        
