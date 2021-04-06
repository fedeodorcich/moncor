<?php 	
	require('conexion.php');
	$prereq="SELECT * FROM especificaciones INNER JOIN vehiculos WHERE vehiculos.cilindrada=especificaciones.cilindrada";
	$prequery=mysqli_query($conexion,$prereq);
	while($preres=mysqli_fetch_array($prequery)){

		//++++++++++++++++++++BLOQUE 1+++++++++++++++++DATER

		//--------------FECHAS------------------
		$today= date("d-m-Y");
		$last= strtotime($preres['last_service']);
		$last_cubiertas= strtotime($preres['last_cubiertas']);
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
		 $dias_carga=ceil(($now-$fecha_carga)/86400);
		 $km_total=$dias_carga*$preres['km_diarios'];//---km totales historico

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


		 $aux_cubiertas=ceil((strtotime($today)-$last_cubiertas)/86400)*$preres['km_diarios'];
		 $upd_cubiertas="UPDATE `vehiculos` SET `km_cubiertas` = '$aux_cubiertas' WHERE `patente` = '$preres[patente]'";

		 $updatercub=mysqli_query($conexion,$upd_cubiertas);

		 if($updatercub)
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

		$cubinf=$preres['km_cubiertas']-500;//----cota inferior para aviso cubiertas
		$cubsup=$preres['km_cubiertas']+500;//----cota superior para aviso cubiertas

		$daysbat=strtotime($preres['last_battery']);
		$dias_bat=ceil(($now-$daysbat)/86400); //----cantidad de dias desde el ultimo service de bateria

		$batinf=($preres['anio_bateria']*365)-5;
		$batsup=($preres['anio_bateria']*365)+3;

		


		if((($future>=$kminf)&&($future<=$kmsup))||(($future>=$cubinf)&&($future<=$cubsup))||(($batinf<=$dias_bat)&&($batsup>=$dias_bat)))
		{
			//--------------busca usuarios asociados a la patente
			$getUser="SELECT * FROM asociacion INNER JOIN users_vehiculos WHERE asociacion.patente='$preres[patente]' AND asociacion.user=users_vehiculos.nombre ";
			$userquery=mysqli_query($conexion,$getUser);

			$type='';

			if(($future>=$kminf)&&($future<=$kmsup))
				$type=$type.' General';

			if(($future>=$cubinf)&&($future<=$cubsup))
				$type=$type.' Cubiertas';

			if(($batinf<=$dias_bat)&&($batsup>=$dias_bat))
				$type=$type.' Batería';



			$i=0;
			$array[]=[];
			while($resUser=mysqli_fetch_array($userquery)){
				echo '<tr>
     				<th scope="row">'.$preres['patente'].'</th>
     				 <td>'.$resUser['nombre'].'</td>
     				 <td>'.$km_total.'</td>
     				 <td>'.$resUser['telefono'].'</td>
     				 <td>'.$type.'</td>';
     				 $user = array(
     				 				"nombre" => $resUser['nombre'],
     				 				"email" => $resUser['email'],
     				 				"patente" => $preres['patente'],
							  );
     				 if($preres['notified']==0)
     				 {
     				 	echo '<td class="text-center"><a class="sender available" id='.$i.'><i data-feather="mail"></i></a></td>';
     				 	$array[$i]=$user;
     				 	$i++;

     				 }else echo '<td class="text-center"><a class="sender"><i data-feather="check-circle"></i></a></td>'; 
   				 echo '</tr>';
			}		
		}
		//+++++++++++++++++++++++++++++++++++++++++++++
	}
 ?>