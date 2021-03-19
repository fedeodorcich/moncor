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
   	 <div>
   	 	<h1>San Juan Bikes</h1>
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
        <a href="usuarios.php"><i data-feather="users"></i>Usuarios</a>
      </li>

      <li>
        <a href="lista_entidades.php"><i data-feather="home"></i>Entidades</a>
      </li>

       <li>
        <a href="" class="activa"><i data-feather="tool"></i>Services</a>
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
   	 			<h3 class="mt-3 mb-4">Service</h3>
          <div class="mb-3">

   	 		     <select class="form-control" name="patente" id="patente" required>
                  <option value="none">Seleccionar patente</option>
                  <?php require('../php/getPatList.php'); ?>
                  
              </select>
              <small class="text-muted mb-3">Controlar la patente antes de seleccionar</small>
          </div>

           <div class="mb-3">
               <label for="date" class="form-label">Fecha del service</label>
               <input type="date" class="form-control" name="date" id="date">
          </div>
				  

				<button class="btn btn-primary mb-3" id="cargar">Cargar</button>

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
     
          let patente = $('#patente').val();
          let date = $('#date').val();
          updateService(patente,date);
    
		});
	});
</script>

</body>
</html>