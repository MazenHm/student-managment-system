<?php 
include("../connection.php");
$a=$_POST['nom'];
//echo $m."<br>";
$b=$_POST['matricule'];
//echo $s."<br>";
$c=$_POST['email'];

$d=$_POST['password'];

$e=$_POST['gender'];
$f=$_POST['classe'];
$UP=$_FILES['file']['name'];
echo $UP;
$UP1=$_FILES['file']['type'];
echo "<br>".$UP1;
$tmp_file=$_FILES['file']['tmp_name'];
echo "<br>".$tmp_file;
$dest_file='../Photo/'. $UP ;
echo "<br>".$dest_file;
/*$test=move_uploaded_file($tmp_file, $dest_file);*/
$ext = strrchr($UP, ".");
$extension_Auto=array('.jpg','.png','.gif');
if(in_array($ext, $extension_Auto)) {
	move_uploaded_file($tmp_file, $dest_file);
}
$_SESSION['file']=$UP;


$sql="INSERT INTO tabetudiant(nomEtudiant,email,password,matricule,sexe,classeId,image) VALUES('$a','$c','$d','$b','$e','$f','$UP')";


$sql1="select matricule from tabetudiant where matricule='$b'";
$res=mysqli_query($connect,$sql1);
$row=mysqli_fetch_assoc($res);


if(empty($a) or empty($b) or empty($c) or empty($d) or empty($e) or empty($f) or empty($UP)) {
	#echo "class existe";
	header('Location:addEtudiant.php?erreur=1');
}

else if(isset($row['matricule']) == $b) {
	#echo "class existe";
	header('Location:addEtudiant.php?erreur=2');
}

else if(mysqli_query($connect,$sql))
{

	header('Location:addEtudiant.php?succes=1');
}

else { echo"Erreur";

}


	
?>
