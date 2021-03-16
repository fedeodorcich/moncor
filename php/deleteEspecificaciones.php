<?php 	
	require('conexion.php');
	$id=$_POST['id'];
	$res="DELETE * FROM especificaciones WHERE id='$id'";
	$query=mysqli_query($conexion,$req);
	if($query){
		echo 1;
	}else{
		echo 0;
	}
 ?>