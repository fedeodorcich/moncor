<?php 
	require('conexion.php');
	$json=$_POST['json'];
	$patente=$json['patente'];
	$req="UPDATE `vehiculos` SET `notified` = 0 WHERE patente= '$patente'";
	$query=mysqli_query($conexion,$req);
	if($query){
		$para = 'fede.odorcich@gmail.com';
		$titulo = 'Enviando email desde PHP';
		$mensaje = 'Se notifica al sr/a'.$json['nombre'].'que el vehiculo de patente '.$json['patente'].'está próximo a requerir un service, su mail es'.$json['email'];
		$cabeceras = 'From: MonCor';

		$enviado = mail($para, $titulo, $mensaje, $cabeceras);

		if ($enviado)
  		{
  			echo 1;	
  		}
		else echo 0;
	}
 ?>