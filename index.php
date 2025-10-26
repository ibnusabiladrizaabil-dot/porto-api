<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *"); // izinkan semua domain
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}


$dataFile = __DIR__ . '/data.json';
if (!file_exists($dataFile)) {
    http_response_code(404);
    echo json_encode(["error" => "Data file not found"]);
    exit;
}


$json = file_get_contents($dataFile);
echo $json;