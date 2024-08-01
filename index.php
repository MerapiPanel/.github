<?php

include __DIR__ . "/vendor/autoload.php";


// Get the full request URI
$requestUri = $_SERVER['REQUEST_URI'];
// Parse the request URI to get the path
$requestPath = parse_url($requestUri, PHP_URL_PATH);

echo $requestPath;
