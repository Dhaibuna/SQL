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