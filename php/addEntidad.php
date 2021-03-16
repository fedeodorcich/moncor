<?php 
	require('conexion.php');
	$entidad=$_POST['entidad'];

	$prereq="SELECT * FROM entidades WHERE nombre='$entidad'";
	$prequery=mysqli_query($conexion,$prereq);

	if(mysqli_num_rows($prequery)==1)
	{
		header('Location:../files/lista_entidades.php');
	}
	else{
		$req="INSERT INTO `entidades` (`id`, `nombre`, `timestamp`) VALUES ('0', '$entidad', current_timestamp());";
		$query=mysqli_query($conexion,$req);
		if($query)
		{
			header('Location:../files/lista_entidades.php');
		}
		else{
			header('Location:../files/lista_entidades.php');
		}
	}

	
?>