<?php 
include("../connection.php");
//echo $m."<br>";
$b=$_POST['etudiant'];
//echo $s."<br>";

$c=$_POST['moyenne'];


$sql="INSERT INTO tabmoyenne(idEtudiant,moy) VALUES('$b','$c')";
$sql1="select idEtudiant from tabmoyenne where idEtudiant='$b'";

$res=mysqli_query($connect,$sql1);
$row=mysqli_fetch_assoc($res);


if (empty($c))
{
	header('Location:addResult.php?erreur=1');

}
else if ((isset($row['idEtudiant']) == $b)) {
	header('Location:addResult.php?erreur=2');
}
else {
if(mysqli_query($connect,$sql))
{
	header('Location:addResult.php?succes=1');

}

}




/*
if (empty($c) or empty($b))
{
	header('Location:addResult.php?erreur=1');

}
else if ((isset($row['idEtudiant']) == $b)) {
	header('Location:addResult.php?erreur=2');
}
else {
	header('Location:addResult.php?succes=1');


}

*/
	
?>





	
