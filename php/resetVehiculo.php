<?php 
	require('conexion.php');
	$patente=$_POST['patente'];
	$req="UPDATE `vehiculos` SET `km_aux` = 0 , `notified` = 0 WHERE patente= '$patente'";
	$query=mysqli_query($conexion,$req);
	if($query){
		echo "reset sucess";
	}
	else
		echo "error";
 ?>