<?php
$envVariables = parse_ini_file('.env');
$server = $envVariables['DBSERVER'];
$username = $envVariables['DBUSER'];
$password = $envVariables['DBPASS'];
$database = $envVariables['DBNAME'];
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

?>