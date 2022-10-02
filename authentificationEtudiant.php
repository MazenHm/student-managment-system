<?php

	session_start();


include ("connection.php");
$matricule=$_POST['matricule'];
$password=$_POST['password'];


$sql="SELECT * FROM tabetudiant WHERE matricule='$matricule' and password='$password'";
$res=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($res);




//print_r($res);

if (empty($matricule) or empty($password)){
	header('Location: studentLog.php?erreur=2');
}


else if(mysqli_num_rows($res)>0)
{
	$_SESSION['matricule']=$matricule;
	$_SESSION['password']=$password;
	//$_SESSION['nom']=$row['nomEtudiant'];
	$_SESSION['nom']=$row['nomEtudiant'];

	$_SESSION['id']=$row['id'];
	$_SESSION['image']=$row['image'];

	
	header('location:dashbord/resultEtudinat.php');

}

/*
if (mysqli_num_rows($res)==1) {
	header("Location:html/resultEtudinat.php");
} 
*/



	else{
		header('Location: studentLog.php?erreur=1'); // utilisateur ou mot de passe incorrect
	 }


?>