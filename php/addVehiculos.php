<?php 
	require('conexion.php');
	$json=$_POST['vehiculo'];
	
	// aca se realiza la carga en la tabla de vehiculos

	$req="INSERT INTO `vehiculos` (`id`, `vehiculo`, `patente`, `cilindrada`, `km_total`, `km_aux`, `km_diarios`, `last_service`, `fecha_carga`, `notified`, `timestamp`) VALUES ('0', '$json[vehiculo]', '$json[patente]', '$json[cilindrada]', '$json[kminiciales]', '$json[kminiciales]', '$json[kmdiarios]',0, current_timestamp(), current_timestamp(), current_timestamp());";

	$queryuser=mysqli_query($conexion,$req);

	if($queryuser)
	{
		
		// aca se realiza la carga de usuarios en la tabla asociacion
		$length=count($json['usuarios']);
		for ($i=0; $i < $length; $i++) { 

			$username=$json['usuarios'][$i];

			$req2="INSERT INTO `asociacion` (`id`, `patente`, `user`, `entidad`, `timestamp`) VALUES ('0', '$json[patente]', '$username', '$json[entidad]', current_timestamp());";

			$queryasociacion=mysqli_query($conexion,$req2);

			if($queryasociacion){
				echo "done";
			}
			else
				echo "mal";
		}
	}

	
 ?>