<?php 	
	require('conexion.php');
	$id=$_POST['entidad'];
	$req="DELETE FROM `entidades` WHERE `entidades`.`id` ='$id' ";
	$query=mysqli_query($conexion,$req);
	if($query){
		echo 1;
	}else{
		echo 0;
	}
 ?>