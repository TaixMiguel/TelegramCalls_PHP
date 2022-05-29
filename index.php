<?php

if (empty($_GET["user"])) {
    echo 'No se indica el parámetro <b>user</b>';
    exit(0);
} else if (empty($_GET["msg"])) {
    echo 'No se indica el parámetro <b>msg</b>';
    exit(0);
}

require_once("src/madelineSession.php");
    
$MadelineProto->messages->sendMessage(peer: '@'.$userName, message: $_GET["msg"]);
$controller = $MadelineProto->requestCall('@'.$userName);
$MadelineProto->echo('Mensaje enviado');
