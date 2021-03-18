<?php 	
	require('conexion.php');
	$prereq="SELECT * FROM especificaciones INNER JOIN vehiculos WHERE vehiculos.cilindrada=especificaciones.cilindrada";
	$prequery=mysqli_query($conexion,$prereq);
	while($preres=mysqli_fetch_array($prequery)){

		//++++++++++++++++++++BLOQUE 1+++++++++++++++++DATER

		//--------------FECHAS------------------
		$today= date("d-m-Y");
		$last= strtotime($preres['last_service']);
		$now=strtotime($today);

		$before = strtotime($today."+ 4 days");//----cota inferior
		$after = strtotime($today."+ 7 days");//----cota superior

		//---------------AUXILIAR--------
		$auxiload=$preres['last_service'];

		//-----------DIFERENCIA DE DÍAS-------
		
		$days=ceil(($after-$last)/86400); //---a 7 dias posteriores le resta el ultimo service y redondea para arriba

		//+++++++++++++++++++++++++++++++++++++++++++++
		

		//++++++++++++++++++++BLOQUE 2+++++++++++++++++UPDATER
		 
		//---!!!AUTOMATIZACION ACUMULA INDEFINIDAS VECES KM total----
		
		 $fecha_carga=strtotime($preres['fecha_carga']);
		 $km_total=ceil(($now-$fecha_carga)/86400)*$preres['km_diarios'];//---km totales historico

		 $km_aux=ceil((strtotime($today)-$last)/86400)*$preres['km_diarios'];//---km recorridos desde el ultimo service
		 $upd="UPDATE `vehiculos` SET `km_aux` = '$km_aux' , `km_total` = '$km_total' WHERE `patente` = '$preres[patente]'";
		
		 
		 $updater=mysqli_query($conexion,$upd);

		 if($updater)
		 {
		 		
		 }
		 else
		 {
		 		echo "update failed";
		 }

		//+++++++++++++++++++++++++++++++++++++++++++++
		
		
		
		//++++++++++++++++++++BLOQUE 3+++++++++++++++++BACK TO THE FUTURE
		
		$future=$days*$preres['km_diarios'];

		$kminf=$preres['km_service']-500;//----cota inferior para aviso km
		$kmsup=$preres['km_service']+500;//----cota superior para aviso km

		echo "<br>patente : ".$preres['patente'];
		echo "<br>dias : ".$days;
		echo "<br>km auxi : ".$km_aux;
		echo "<br>km futuros :".$future;
		echo "<br>km totales :".$km_total;
		echo "<br>";
		if(($future>=$kminf)&&($future<=$kmsup))
		{
			//--------------busca usuarios asociados a la patente
			$getUser="SELECT * FROM asociacion INNER JOIN users_vehiculos WHERE asociacion.patente='$preres[patente]' AND asociacion.user=users_vehiculos.nombre ";
			$userquery=mysqli_query($conexion,$getUser);

			while($resUser=mysqli_fetch_array($userquery)){
				echo '<h4>'.$resUser['nombre'].'---'.$resUser['email'].'</h4>';
				echo "<hr><br>";
			}
			echo "<h2>entra en service".$preres['km_service'].'---'.$preres['patente']."</h2><br>";
		}

		//+++++++++++++++++++++++++++++++++++++++++++++
	
		
	}



 ?>


