<?php

require_once("src/madelineSession.php");

$MadelineProto->messages->sendMessage(peer: '@'.$userName, message: $_GET["msg"]);
$controller = $MadelineProto->requestCall('@'.$userName);
$MadelineProto->echo('Mensaje enviado');
