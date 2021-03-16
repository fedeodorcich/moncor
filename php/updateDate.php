<?php 	
	require('conexion.php');
	$prereq="SELECT * FROM vehiculos INNER JOIN especificaciones WHERE vehiculos.cilindrada=especificaciones.cilindrada";
	$prequery=mysqli_query($conexion,$prereq);
	
	while($res=mysqli_fetch_array($prequery))
	{
		$fecha_actual = date("d-m-Y");
		$semana = date("d-m-Y",strtotime($fecha_actual."+ 7 days"));
		//--------obtener el kmxservice y multiplicarlo
		if($res['last_service'])
	}
 ?>