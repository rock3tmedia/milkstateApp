<?php

//set header to json
header('Content-type: application/json');

//store
$option_data = array();
$the_option_data = array();

//get options
include 'options.php';

//data
$the_option_data['app_name'] = $app_name;
$the_option_data['base_url'] = $base_url;
$the_option_data['is_root'] = $is_root;

//join data
$option_data[] = $the_option_data;

//print to json
echo json_encode($option_data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);