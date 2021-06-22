<?php 
	require('conexion.php');
	$entidad=$_POST['entidad'];

	$req="SELECT * FROM users_vehiculos WHERE entidad='$entidad'";
	$query=mysqli_query($conexion,$req);

	while($res=mysqli_fetch_array($query))
	{
		echo '<option value="'.$res['email'].'">'.$res['email'].'</option>';
	}

	
?>