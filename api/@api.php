<?php

header('Content-type: application/json');

//store
$api_data = array();
$the_api_data = array();

//data
$the_api_data['dev_id'] = '1';
$the_api_data['dev_key'] = '56a26a18c775285f74c1879e26cceabb';

$api_data[] = $the_api_data;

echo json_encode($api_data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

