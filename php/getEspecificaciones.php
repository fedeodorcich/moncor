<?php 
	require('conexion.php');
	$read="SELECT * FROM especificaciones WHERE id!=0";
	/*$create="INSERT INTO `especificaciones` (`id`, `vehiculo`, `cilindrada`, `km_service`, `timestamp`) VALUES ('0', 'moto', '70', '150', current_timestamp())";
	$update="UPDATE `especificaciones` SET `km_service` = '210' WHERE `especificaciones`.`id` = 2";
	$delete="DELETE * FROM `especificaciones` WHERE ";*/
	$query=mysqli_query($conexion,$read);
	while($res=mysqli_fetch_array($query))
	{
		echo '<tr>
     				 <td>'.$res['vehiculo'].'</td>
     				 <td>'.$res['cilindrada'].'</td>
     				 <td>'.$res['km_service'].'</td>
             <th><button type="button" class="btn btn-sm btn-danger deleter" name="'.$res['id'].'">
                Eliminar
            </button>
             </th>
   				 </tr>';
	}
 ?>

