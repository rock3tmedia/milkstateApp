<?php

//options
$app_name = "milkstateApp"; //name of directory containing app
$base_url = "/"; //directory leading to app
$is_root = false; //set to true if app is the root

//check root and set url - no need to edit - base must have trailing slash
if(!$is_root){
    $base_url = "/". $app_name . "/";
}
