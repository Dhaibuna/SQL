<?php

//Questions

function new_question($x){

$block = "<br/><hr/><br/><br/>Answer to question $x :<br/>";
echo $block;

}

// Result

function printr($result) {
    echo "<pre>";
    print_r($result);
    echo "</pre>";
}

// Query DB

function dbQuery(){
    $db = new PDO("mysql:host=mysql;dbname=classicmodels;port=3306", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}