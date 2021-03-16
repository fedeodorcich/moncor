<?php 
	require('conexion.php');

	$vehiculo=$_POST['vehiculo'];
	$tipo=$_POST['tipo'];
	$km=$_POST['service'];

	$prereq="SELECT * FROM `especificaciones` WHERE cilindrada='$tipo' AND vehiculo='$vehiculo'";
	$prequery=mysqli_query($conexion,$prereq);
	print_r(mysqli_num_rows($prequery));

	if(mysqli_num_rows($prequery)==1)
	{
		header('Location:../files/settings.php');
	}
	else{
		$req="INSERT INTO `especificaciones` (`id`, `vehiculo`, `cilindrada`, `km_service`, `timestamp`) VALUES ('0', '$vehiculo', '$tipo', '$km', current_timestamp())";
		$query=mysqli_query($conexion,$req);
		if($query)
		{
			header('Location:../files/settings.php');
		}
		else{
			header('Location:../files/settings.php');
		}
	}
 ?>