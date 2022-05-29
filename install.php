<?php

require_once("src/madelineSession.php");
$MadelineProto->start();

if ($multiuser) { $MadelineProto->echo("Madeline para el usuario $userName configurado"); }
else { $MadelineProto->echo("Madeline para el usuario configurado"); }
