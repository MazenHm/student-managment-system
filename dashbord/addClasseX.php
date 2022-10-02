<?php 
include("../connection.php");
$m=$_POST['nom'];
//echo $m."<br>";
$s=$_POST['section'];
//echo $s."<br>";

$n=$_POST['niveau'];

$x=$_POST['grade'];


$sql="INSERT INTO tabclasses(classeName,section,niveau,grade) VALUES('$m','$s','$n','$x')";


$sql1="select classeName from tabclasses where classeName='$m'";
$res=mysqli_query($connect,$sql1);
$row=mysqli_fetch_assoc($res);


if(empty($m) or empty($s) or empty($n) or empty($x)) {
	#echo "class existe";
	header('Location:addClasse.php?erreur=2');
}

else if(isset($row['classeName']) == $m) {
	#echo "class existe";
	header('Location:addClasse.php?erreur=1');
}

else if(mysqli_query($connect,$sql))
{

	header('Location:addClasse.php?succes=1');
}

else { echo"Erreur";

}






	
?>