<?php

//config
//
$config = array();

$config["name"] = "Erviker ARG";
$config["tasks"] = 12;
$config["hint"] = 2;

$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'ARG',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'Apollo14',
    'charset' => 'utf8'
]);



?>