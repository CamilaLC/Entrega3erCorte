<?php

$dbname = 'UnityDB';
$dbuser = 'camilo';
$dbpass = 'Noviembre2018';
$dbhost = 'localhost';

$conect = new mysqli($dbhost, $dbuser, $dbpass,$dbname);

$UserID = $_REQUEST['UserID'];
$Nombre = $_REQUEST['Nombre'];
$Apellido = $_REQUEST['Apellido'];
$Ult_Decision = $_REQUEST['Ult_Decision'];
$Dec = $_REQUEST['Dec'];

$IDexistente = mysqli_query($conect, "SELECT * FROM CallOfDutyColombia WHERE UserID = '$UserID' ");

while($row = mysqli_fetch_array($IDexistente)){
  $IdUser = $row['UserID'];
}


if($IdUser == null){
  $adicionarDatos = mysqli_query($conect, "INSERT INTO CallOfDutyColombia (UserID,Nombre,Apellido,Ult_Decision) VALUES('$UserID','$Nombre','$Apellido','$Ult_Decision')");
  $Dec1 = mysqli_query($conect, "UPDATE CallOfDutyColombia SET Dec1=$Dec WHERE UserID='$UserID'");
  echo $Ult_Decision + 1;
} else{
  if($Ult_Decision == 2){
       $Dec2 = mysqli_query($conect, "UPDATE CallOfDutyColombia SET Dec2 = $Dec WHERE UserID = '$UserID' ");
   }else if($Ult_Decision == 3){
       $Dec3 = mysqli_query($conect, "UPDATE CallOfDutyColombia SET Dec3 = $Dec WHERE UserID = '$UserID' ");
   }else if($Ult_Decision == 4){
       $Dec4 = mysqli_query($conect, "UPDATE CallOfDutyColombia SET Dec4 = $Dec WHERE UserID = '$UserID' ");
   }else if($Ult_Decision == 5){
       $Dec5 = mysqli_query($conect, "UPDATE CallOfDutyColombia SET Dec5 = $Dec WHERE UserID = '$UserID' ");
   }else if($Ult_Decision == 6){
       $Dec6 = mysqli_query($conect, "UPDATE CallOfDutyColombia SET Dec6 = $Dec WHERE UserID = '$UserID' ");
   }
    echo $Ult_Decision + 1;
}//FINAL ELSE


?>