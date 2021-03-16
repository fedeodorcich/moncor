<?php 
	require('conexion.php');
	$json=$_POST['user'];
	$nombre=$json['nombre'];
	$email=$json['email'];
	$prereq="SELECT * FROM users_vehiculos WHERE email='$email'";
	$prequery=mysqli_query($conexion,$prereq);

	if(mysqli_num_rows($prequery)==1)
	{
		echo '<div class="alert alert-warning container col-md-6 text-center" role="alert">El usuario ya se encuentra cargado!</div>';
	}
	else{
		$req="INSERT INTO `users_vehiculos` (`id`, `nombre`, `telefono`, `email`, `entidad`, `timestamp`) VALUES ('0', '$json[nombre]', '$json[telefono]', '$json[email]', '$json[entidad]', current_timestamp());";
		$query=mysqli_query($conexion,$req);
		if($query)
		{
			echo '<div class="alert alert-success container col-md-6 text-center" role="alert">Carga exitosa!</div>';
		}
		else{
			echo '<div class="alert alert-danger container col-md-6 text-center" role="alert">Problema en servidor, intente nuevamente!</div>';
		}
	}

	
?>