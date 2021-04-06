<?php 
  require('../php/conexion.php');
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
      <div id="side-img">
      <img src="../src/img/logo-moncor-side.png">
     </div>

     <!----------------------------MENU SIDENAV---------------->
    <ul>
      <li>
        <a href="dashboard.php"><i data-feather="layers"></i>Panel General</a>
      </li>

      <li>
        <a href="alta.php"><i data-feather="plus-square"></i>Alta de Vehículo</a>
      </li>

      <li>
        <a href="" class="activa"><i data-feather="users"></i>Usuarios</a>
      </li>

      <li>
        <a href="lista_entidades.php"><i data-feather="home"></i>Entidades</a>
      </li>

       <li>
        <a href="service.php"><i data-feather="tool"></i>Services</a>
      </li>

      <li>
        <a href="settings.php"><i data-feather="sliders"></i>Especificaciones</a>
      </li>


     </ul>

     <form class="d-flex">
            <button class="btn-custom mt-3" type="submit"><i data-feather="log-out"></i>Cerrar Sesión</button>
        </form>

   </nav>


   <div id="contenedor">

      <div class="navbar bg-dark">

          <a id="clicker"><i data-feather="menu"></i></a>
          
         
   	  </div>

   	 <div class="mainer">
   	 		
   	 	<div class="card col-md-6 col-12 container mt-1">
   	 		<form action="" class="p-2">
   	 			<h3>Alta de Usuarios</h3>
   	 			<div class="row">
   	 				<div class="mb-3 col">
  					<label for="nombre" class="form-label">Nombre</label>
  					<input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" required>
				</div>
				<div class="mb-3 col">
  					<label for="entidad" class="form-label">Entidad</label>
            <select name="entidad" id="entidad" class="form-control">
                <option value="none">Seleccionar entidad</option>
                <?php require('../php/getEntidadesLista.php'); ?>
            </select>
				</div>
   	 			</div>
   	 			
   	 			<div class="row">
   	 				<div class="mb-3 col">
  					<label for="email" class="form-label">E-mail</label>
  					<input type="email" class="form-control" id="email" placeholder="Ej: usuario@gmail.com" required>
				</div>
				<div class="mb-3 col">
  					<label for="telefono" class="form-label">Teléfono</label>
  					<input type="number" class="form-control" id="telefono" placeholder="Ej: 2644355678" required>
				</div>
   	 			</div>
				

				<button class="btn btn-primary" id="cargar">Guardar Usuario</button>

   	 		</form>
   	 	</div>
   	 
   	 </div>

   </div>
</div>




<script src="../js/jquery.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../ajax/ajaxCarga.js"></script>
<script src="../js/scripts.js"></script>

<script>
	$(document).ready(function(){
		$('#cargar').on('click',function(){
			event.preventDefault();
      if(($('#entidad').val())!='none')
      {
          let user = {
              "nombre": $('#nombre').val(),
              "entidad": $('#entidad').val(),
              "telefono": $('#telefono').val(),
              "email": $('#email').val(),
          }
          cargaUser(user);
      }
      else{
        console.log("elegi bien!");
      }
		});
	});
</script>

</body>
</html>