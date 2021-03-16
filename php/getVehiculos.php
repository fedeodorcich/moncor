<?php 
	require('conexion.php');
	$fecha_actual = date("d-m-Y");
	$semana = date("d-m-Y",strtotime($fecha_actual."+ 7 days"));
	$req="SELECT * FROM `vehiculos` WHERE last_service<'$semana'";
	$query=mysqli_query($conexion,$req);

	while($res=mysqli_fetch_array($query)) {
		$req2="SELECT * FROM `vehiculos` INNER JOIN ";
	}
 ?>