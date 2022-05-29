<?php

$string = file_get_contents("resources/config.json");
$json = json_decode($string, true);

$multiuser = isset($json['settings']["multiuser"]) ? $json['settings']["multiuser"] : false;

if ($multiuser && empty($_GET["user"])) {
    echo 'No se indica el parámetro <b>user</b>';
    exit(0);
}

require_once 'vendor/autoload.php';

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
$sessionFile = $multiuser ? 'resources/' . $userName . '_session.madeline' : 'resources/session.madeline';
$MadelineProto = new \danog\MadelineProto\API($sessionFile, $settings);
