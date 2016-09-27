<?php
//
const template  = 'template:';
const CONFIG_VAR = 'var:';

$template_key = rtrim(template,':');
$config_var_key = rtrim(CONFIG_VAR,':');

$opt = getopt('',[template,CONFIG_VAR]);
// var_dump($a);

// var_dump($opt);
// echo rtrim(CONFIG_VAR,':');
// echo rtrim(template,':');
// return;


if(!isset($opt[$template_key],$opt[$config_var_key]))
{
	echo  'php convert.php  --template template.php --var config.php';
	return;
}

require_once $opt[$config_var_key];

$res = require_once $opt[$template_key];

// echo $res;
$file_name = $opt[$template_key].$opt[$config_var_key].'txt';
file_put_contents($file_name, $res);