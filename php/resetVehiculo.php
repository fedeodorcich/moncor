<?php 
	require('conexion.php');
	$patente=$_POST['patente'];
	$date=$_POST['date'];
	if($patente!='none')
	{
		$req="UPDATE `vehiculos` SET `km_aux` = 0 , `notified` = 0 WHERE patente= '$patente'";
		$query=mysqli_query($conexion,$req);
		if($query){
			$req2="INSERT INTO `registros` (`id`, `patente`, `fecha`, `timestamp`) VALUES ('0', '$patente', '$date', current_timestamp())";
			$query2=mysqli_query($conexion,$req2);
			if($query2){
				echo '<div class="alert alert-success col-11 container mt-3 col-md-4" role="alert">
  				Service registrado con éxito
			  	</div>';
			}
			else echo '<div class="alert alert-warning col-11 container mt-3 col-md-4" role="alert">
  				Consultar al técnico
			  </div>';
		
		}
		else
			echo '<div class="alert alert-danger col-11 container mt-3 col-md-4" role="alert">
  				Service no cargado
			  </div>';
	}else{
		echo '<div class="alert alert-danger col-11 container mt-3 col-md-4" role="alert">
  				Service no cargado
			  </div>';
	}
	
 ?>