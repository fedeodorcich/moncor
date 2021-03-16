<?php 
	require('conexion.php');
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$req="SELECT * FROM users WHERE user='$user' AND pass='$pass'";
	$query=mysqli_query($conexion,$req);
	if($res=mysqli_fetch_array($query))
	{
		session_start();
		$_SESSION['user']=$res['user'];
		$_SESSION['name']=$res['name'];

		echo 1;
	}
	else{
		echo '<div class="alert alert-danger col-11 container mt-3 col-md-4" role="alert">
  				Usuario o contraseña incorrectos
			  </div>';
	}
 ?>