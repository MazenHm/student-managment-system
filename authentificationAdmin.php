<?php

	session_start();


include ("connection.php");
$e=$_POST['email'];
$p=$_POST['password'];


$sql="SELECT * FROM log_admin WHERE email='$e' and password='$p'";



$res=mysqli_query($connect,$sql);

$row=mysqli_fetch_assoc($res);

//print_r($res);

if (empty($e) or empty($p)){
	header('Location: index.php?erreur=2');
}

else if (mysqli_num_rows($res)==1){

	$_SESSION['e']=$e;
	$_SESSION['p']=$p;
	$_SESSION['image']=$row['image'];

	header('location:dashbord/dashbord.php');

}

 /*{
	echo '<script>alert("Email où Mot de passe incorect !!")</script>';

}*/
else{
	header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
 }

?>