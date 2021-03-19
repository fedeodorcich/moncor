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

		//+++++++++++++++++++++++++++++++++++++++++++++
		
		
		
		//++++++++++++++++++++BLOQUE 3+++++++++++++++++BACK TO THE FUTURE
		
		$future=$days*$preres['km_diarios'];

		$kminf=$preres['km_service']-500;//----cota inferior para aviso km
		$kmsup=$preres['km_service']+500;//----cota superior para aviso km

		if(($future>=$kminf)&&($future<=$kmsup))
		{
			//--------------busca usuarios asociados a la patente
			$getUser="SELECT * FROM asociacion INNER JOIN users_vehiculos WHERE asociacion.patente='$preres[patente]' AND asociacion.user=users_vehiculos.nombre ";
			$userquery=mysqli_query($conexion,$getUser);
			$i=0;
			$array[]=[];
			while($resUser=mysqli_fetch_array($userquery)){
				echo '<tr>
     				<th scope="row">'.$preres['patente'].'</th>
     				 <td>'.$resUser['nombre'].'</td>
     				 <td>'.$km_total.'</td>
     				 <td>'.$resUser['telefono'].'</td>';
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


