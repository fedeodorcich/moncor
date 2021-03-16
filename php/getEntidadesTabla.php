<?php 
	require('conexion.php');

	$req="SELECT * FROM entidades WHERE id!=0"; // usar inner join para contar vehiculos
	$query=mysqli_query($conexion,$req);

	while($res=mysqli_fetch_array($query))
	{
		$cant=0;
		$req2="SELECT DISTINCT patente FROM asociacion WHERE entidad='$res[nombre]'";
		$query2=mysqli_query($conexion,$req2);
		while($res2=mysqli_fetch_array($query2))
		{
			$cant++;
		}
		echo '<tr>
			 <th scope="row">'.$res['id'].'</th>
             <th>'.$res['nombre'].'</th>
             <th>'.$cant.'</th>
             <th><button type="button" class="btn btn-sm btn-danger deleter" name="'.$res['id'].'">
                Eliminar
            </button>
             </th>
           </tr>';
	}

	
?>