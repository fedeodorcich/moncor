<?php 
	require('conexion.php');
	$patente=$_POST['patente'];
	$req="SELECT * FROM `vehiculos` WHERE patente='$patente'";
	$query=mysqli_query($conexion,$req);

	if($patente=='')
	{
		echo 2;
	}
	else{
		if($consulta=mysqli_fetch_row($query))
		{
			echo 1;
		}
		else{
			echo 0;
		}
	}
	

 ?>