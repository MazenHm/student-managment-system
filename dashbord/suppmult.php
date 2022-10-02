<?php
    include("../connection.php");

$arr=$_POST['supp'];

foreach ($arr as $key => $value) {
	// code...
	$sql="delete from tabmoyenne where id='$value'";
	if (mysqli_query($connect,$sql))
	header('Location:manageResult.php?erreur=7');
}




?>