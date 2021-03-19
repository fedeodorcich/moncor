<?php 
	require('conexion.php');
	$req="SELECT * FROM vehiculos WHERE id!=0";
	$query=mysqli_query($conexion,$req);
	while($res=mysqli_fetch_array($query))
	{
		echo "<option value=".$res['patente'].">".$res['patente']."</option>";
	}
 ?>