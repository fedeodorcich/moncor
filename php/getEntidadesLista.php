<?php 
	require('conexion.php');

	$req="SELECT * FROM entidades WHERE id!=0"; // usar inner join para contar vehiculos
	$query=mysqli_query($conexion,$req);


	while($res=mysqli_fetch_array($query))
	{
		echo '<option value="'.$res['nombre'].'">'.$res['nombre'].'</option>';
          
	}

	
?>