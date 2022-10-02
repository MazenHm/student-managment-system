<?php 
include("../connection.php");

$id=$_POST['id'];
echo $id;

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

$sql2="update tabetudiant set nomEtudiant='$a',email='$c',password='$d', matricule='$b',sexe='$e',classeId='$f',image='$UP' where id='$id'";
if (mysqli_query($connect,$sql2)){
    header('location:manageEtudiant.php');
}


?>


