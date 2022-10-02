<?php 
include("../connection.php");

$id=$_GET['id'];
$sql="delete from tabmoyenne where id='$id'";
if (mysqli_query($connect,$sql)){
header('location:manageresult.php');
}
else {
    echo "error";
}
?>