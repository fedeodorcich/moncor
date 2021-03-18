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
		 		echo "update complete";
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


		if(($future>=$kminf)&&($future<=$kmsup))
		{
			$getUser="SELECT * FROM asociacion INNER JOIN users_vehiculos WHERE asociacion.patente='$preres[patente]'";
			$userquery=mysqli_query($conexion,$getUser);
			while($resUser=mysqli_fetch_array($userquery)){
				echo '<h4>'.$resUser['nombre'].'---'.$resUser['email'].'</h4>';
				echo "<hr><br>";
			}
			echo "<h2>entra en service</h2><br>".$preres['km_service'];
		}
		else{
			echo "<h2>".$kminf."----".$future."---".$kmsup."</h2>";
		}

		//+++++++++++++++++++++++++++++++++++++++++++++
		

		//+++++++++++++++++++BLOQUE 4++++++++++++++++++++
		


		//+++++++++++++++++++++++++++++++++++++++++++++++



		//1- obtener numero de dias entre ultimo service y hoy (proximos 7 dias)
		//2- multiplicar la cantidad de dias x km_diarios y asignarlo a km auxiliar
		//3- cuando el auxiliar este cercano a km_service mostrar
		//4- el km total acumula km_diarios * fechadecarga hasta ahora
		// 
		

		echo "<br>patente : ".$preres['patente'];
		echo "<br>dias : ".$days;
		echo "<br>km auxi : ".$km_aux;
		echo "<br>km futuros :".$future;
		echo "<br>km totales :".$km_total;
		echo "<br>";
		
	}







 /*$prereq="SELECT * FROM especificaciones WHERE id!=0"; //---CONSULTA ESPECIFICACIONES DISPONIBLES
	$prequery=mysqli_query($conexion,$prereq);
	
	while($res=mysqli_fetch_array($prequery))
	{
		$req="SELECT * FROM vehiculos INNER JOIN asociacion WHERE vehiculos.cilindrada='$res[cilindrada]'";//----INTERSECCIONA TABLAS PARA OBTENER EL USUARIO
		$query=mysqli_query($conexion,$req);
		while($res1=mysqli_fetch_array($query)){
			$req1="SELECT * FROM users_vehiculos WHERE ";//----PIDE DATOS DEL USUARIO PARA ENVIAR MAIL

			$query1=mysqli_query($conexion,$req1);
			while($final=mysqli_fetch_array($query1)){
				echo $final['email'];
			}
		}
		$fecha_actual = date("d-m-Y");
		$semana = date("d-m-Y",strtotime($fecha_actual."+ 7 days"));
		//--------obtener el kmxservice y multiplicarlo
		//si los km estan entre 3500 y 4500 en el caso de que sea 4000 quizas
	}*/
 ?>


