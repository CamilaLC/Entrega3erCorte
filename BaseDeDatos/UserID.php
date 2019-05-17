<?php

//Codigo para que aumente el userID sumando 1 al ultimo jugador

$dbname = 'UnityDB';
$dbuser = 'camilo';
$dbpass = 'Noviembre2018';
$dbhost = 'localhost';

$conect = new mysqli($dbhost, $dbuser, $dbpass,$dbname);

$ID = mysqli_query($conect, "SELECT MAX(UserID) FROM CallOfDutyColombia");

while($row = mysqli_fetch_array($ID)){
    $buscarID = $row['MAX(UserID)'];
}

echo $buscarID + 1;



?>