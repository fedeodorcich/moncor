<?php 
	require('conexion.php');
	$patente=$_POST['patente'];
	$date=$_POST['date'];
	$type=$_POST['type'];


	$dater = date_create($date.' 12:00:00');
	$d=date_format($dater,'Y-m-d H:i:s');


	if($patente!='none')
	{
		switch($type){
			//-------------------------------------------------CASO GENERAL---------------------------
			case 0:
				$req="UPDATE `vehiculos` SET `km_aux` = 0 , `km_total` = 0 , `notified` = 0 , `last_service` = '$d' WHERE patente= '$patente'";
				$query=mysqli_query($conexion,$req);
				if($query){
					$req2="INSERT INTO `registros` (`id`, `patente`, `fecha`, `timestamp`) VALUES ('0', '$patente', '$d', current_timestamp())";
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
  				Service no cargado 1
			  </div>';
				break;
			//-------------------------------------------------CASO CUBIERTAS---------------------------
			case 1:
				$req="UPDATE `vehiculos` SET `km_cubiertas` = 0 , `total_cubiertas` = 0 ,`notified` = 0 , `last_cubiertas` = '$d' WHERE patente= '$patente'";
				$query=mysqli_query($conexion,$req);
				if($query){
					$req2="INSERT INTO `registros` (`id`, `patente`, `fecha`, `timestamp`) VALUES ('0', '$patente', '$d', current_timestamp())";
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
  				Service no cargado 1
			  </div>';
				break;
			//-------------------------------------------------CASO BATERIAS---------------------------
			case 2:
				$req="UPDATE `vehiculos` SET `notified` = 0 , `last_battery` = '$d' WHERE patente= '$patente'";
				$query=mysqli_query($conexion,$req);
				if($query){
					$req2="INSERT INTO `registros` (`id`, `patente`, `fecha`, `timestamp`) VALUES ('0', '$patente', '$d', current_timestamp())";
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
  				Service no cargado 1
			  </div>';
				break;
		}
		
	}else{
		echo '<div class="alert alert-danger col-11 container mt-3 col-md-4" role="alert">
  				Service no cargado 2
			  </div>';
	}
 ?>