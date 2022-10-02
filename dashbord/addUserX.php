<?php 



include("../connection.php");
$e=$_POST['email'];
//echo $m."<br>";
$p=$_POST['password'];
//echo $s."<br>";
$pp=$_POST['password2'];


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


$sql="INSERT INTO log_admin (email,password,image) VALUES('$e','$p','$UP')";


$sql1="select email from log_admin where email='$e'";
$res=mysqli_query($connect,$sql1);
$row=mysqli_fetch_assoc($res);

if(empty($e)or empty($p) or empty($pp))
{

	header('Location:addUser.php?erreur=2');
}
else if(isset($row['email']) == $e) {
	#echo "class existe";
	header('Location:addUser.php?erreur=1');
}



else if ($p!=$pp){
	header('Location:addUser.php?erreur=3');
}

else if(mysqli_query($connect,$sql))
{

	header('Location:addUser.php?succes=1');
}

else { echo"Erreur";

}




	
?>