<?php

$dbname = 'UnityDB';
$dbuser = 'camilo';
$dbpass = 'Noviembre2018';
$dbhost = 'localhost';

$conect = new mysqli($dbhost, $dbuser, $dbpass,$dbname);

if ($conect->connect_error) {
	die("Error: No se pudo conectar" . $conect->connect_error);
}


$conexion = $_GET["conexion"];

if($conexion == "valConexion")
{
	echo "Conectado";
}




?>