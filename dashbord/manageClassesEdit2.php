<?php 

include("../connection.php");


$id=$_POST['id'];

$m=$_POST['nom'];
//echo $m."<br>";
$s=$_POST['section'];
//echo $s."<br>";
$nn=$_POST['niveau'];
//echo $nn."<br>";
$nnn=$_POST['grade'];

$sql2="update tabclasses set classeName='$m',section='$s',niveau='$nn',grade='$nnn' where id='$id'";



if(mysqli_query($connect,$sql2))
header('Location:manageClasse.php?succes=3');
//echo"<script language='javascript'>\nalert(\"Le d\351lai d\'attente est trop long\\nou veuillez accepter les cookies pour ce site.\");\n</script>";
?>