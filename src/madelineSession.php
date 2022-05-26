<?php

require_once 'vendor/autoload.php';

$string = file_get_contents("src/config.json");
$json = json_decode($string, true);

$settings = [
    'logger' => [
        'logger_level' => $json['logger']["logger_level"]
    ],
    'serialization' => [
        'serialization_interval' => $json['serialization']["serialization_interval"],
        'cleanup_before_serialization' => $json['serialization']["cleanup_before_serialization"],
    ],
    'app_info' => [
        'api_id' => $json['app_info']["api_id"],
        'api_hash' => $json['app_info']["api_hash"],
    ]
];

$userName = $_GET["user"];
$MadelineProto = new \danog\MadelineProto\API($userName . '_session.madeline', $settings);