<?php


add_action("test_action","test_hook_func");

function test_hook_func(){
    echo('hello from action hook');
};


add_action("html_head", "html_head_func",1,1);

function html_head_func($title){
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html($title)?> </title>
</head>

<?php
};

function change_paragraph($default){
    return "the " . $default . "is modified" ;
};

add_filter("paragraph_filter","change_paragraph");


function uppercase_des($description){
    return strtoupper($description);
};

add_filter("the_description","uppercase_des");

?>