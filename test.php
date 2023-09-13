<?php

$envVariables = parse_ini_file('.env');
$Host = $envVariables['HOST_NAME'];
$Url = $envVariables['URL'];
$cert = $envVariables['CERTFILE'];
$key = $envVariables['KEYFILE'];



?>