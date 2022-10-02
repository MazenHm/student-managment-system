<?php 
include("../connection.php");

$id=$_GET['id'];
$sql="delete from tabclasses where id='$id'";
if (mysqli_query($connect,$sql)){
    header('Location:manageClasse.php?succes=1');}

?>