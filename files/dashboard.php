<?php 
  require('../php/conexion.php');
  session_start();
  $user= $_SESSION['user'];
  if(($user==null)||($user==''))
  {
    print_r($user);
    header('Location:../unauthorized.html');
  }

 ?>
<!DOCTYPE html>
<html>
<head>

	<title>San Juan Bikes</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/styles.css">
	
	<script src="../js/feather.min.js"></script>

</head>
<body>




<div class="wrapper">

	
   <nav id="sidenav" class="bg-dark activenav">
   	 <div>
   	 	<h1>San Juan Bikes</h1>
   	 </div>

     <!----------------------------MENU SIDENAV---------------->
   	 <ul>
      <li>
        <a href="" class="activa"><i data-feather="layers"></i>Panel General</a>
      </li>

      <li>
        <a href="alta.php"><i data-feather="plus-square"></i>Alta de Vehículo</a>
      </li>

      <li>
        <a href="usuarios.php"><i data-feather="users"></i>Usuarios</a>
      </li>

      <li>
        <a href="lista_entidades.php"><i data-feather="home"></i>Entidades</a>
      </li>

      <li>
        <a href="settings.php"><i data-feather="settings"></i>Settings</a>
      </li>

     </ul>

   </nav>

   <div id="contenedor">

      <div class="navbar bg-dark">

          <a id="clicker"><i data-feather="menu"></i></a>
          
          <form class="d-flex">
            <button class="btn btn-danger" type="submit"><i data-feather="log-out"></i>Cerrar Sesión</button>
          </form>
   	  </div>

   	 <div class="mainer">
   	 	<table class="table col-md-12 container mt-5">
  				<thead class="table-dark">
    				<tr>
      				<th scope="col">Patente</th>
      				<th scope="col">Usuario</th>
      				<th scope="col">Vehículo</th>
      				<th scope="col">Kilómetros totales</th>
      				<th class="text-center" scope="col">Enviar mail</th>
    				</tr>
  				</thead>
  				<tbody>
    				<tr>
     				<th scope="row">CWJ 389</th>
     				 <td>Roberto Pérez Huerta</td>
     				 <td>Moto</td>
     				 <td>70000</td>
     				 <td class="text-center"><a><i data-feather="mail"></i></a></td>
   				 </tr>
 				 </tbody>
			</table>
   	 </div>

   </div>
</div>




<script src="../js/jquery.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/scripts.js"></script>

</body>
</html>