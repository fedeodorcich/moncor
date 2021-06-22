<?php 
	require('conexion.php');
	$array=$_POST['json'];
	var_dump($array);
	$n = sizeof($array);
	$patente = $array[0]['patente'];

	$req="UPDATE `vehiculos` SET `notified` = 1 WHERE patente= '$patente'";
	$query=mysqli_query($conexion,$req);

	if($query){
		for ($i=0; $i < $n ; $i++) { 

			$para = $array[$i]['email'];
			$titulo = 'Recordatorio de Service';
			$mensaje = '

	<style>
		*{
			font-family:"Helvetica" ,sans-serif;
			text-align: center;
		}
		#first{
			background-color: #0d6efd;
			color:white;
			padding: 1em;
			margin: 0;
			font-weight: bolder;

		}
		#second{
			color: #a1a1a1;
			margin: 0;
			padding: 1em;
			font-weight: lighter;
			font-stretch:condensed;
		}
		#third{
			background-color: #0d6efd;
			color: white;
			padding: 1em;
		}
	</style>

	<div id="first">
		<h1>SAN JUAN BIKER</h1>
		<h3>Recordatorio de Service</h3>
	</div>

	<div id="second">
		<p>Se notifica al <b>Sr/a '.$array[$i]['nombre'].'</b> que el vehiculo de '.$patente.' <b>CWJ287</b> está próximo a requerir un service</p>
		<p>para efectuar dicho service acercarse por el local de San Juan Biker</p>
		<b>Av.Rawson 1232 Sur - Capital</b>
	</div>

	<div id="third">
		<span>
			No responda este mail
		</span>
	</div>
';
			$cabeceras = 'From: San Juan Biker';

			$enviado = mail($para, $titulo, $mensaje, $cabeceras);

			if ($enviado)
  			{
  				echo 1;
  			}
			else echo 0;

		}
		echo 2;
		
	}
	else{
		echo 0;
	}

 ?>