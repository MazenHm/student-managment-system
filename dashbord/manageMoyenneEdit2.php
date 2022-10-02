<?php 

include("../connection.php");


$id=$_POST['id'];
//echo $id."<br>";
$m=$_POST['classe'];
//echo $m."<br>";
$s=$_POST['etudiant'];
//echo $s."<br>";
$nn=$_POST['moyenne'];
//echo $nn."<br>";



$sql2="update tabmoyenne set moy='$nn' where id='$id'";



if(mysqli_query($connect,$sql2))
header('location:manageResult.php');
else {
echo"<script language='javascript'>\nalert(\"Le d\351lai d\'attente est trop long\\nou veuillez accepter les cookies pour ce site.\");\n</script>";

}

?>


