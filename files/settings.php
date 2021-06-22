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
        <a href="usuarios.php"><i data-feather="users"></i>Usuarios</a>
      </li>

      <li>
        <a href="lista_entidades.php"><i data-feather="home"></i>Entidades</a>
      </li>

       <li>
        <a href="service.php"><i data-feather="tool"></i>Services</a>
      </li>

      <li>
        <a href="" class="activa"><i data-feather="sliders"></i>Especificaciones</a>
      </li>


     </ul>

     <form class="d-flex" action="../php/sessionDestroyer.php">
            <button class="btn-custom mt-3" type="submit"><i data-feather="log-out"></i>Cerrar Sesión</button>
        </form>

   </nav>

   <div id="contenedor">

      <div class="navbar bg-dark">

          <a id="clicker"><i data-feather="menu"></i></a>
        
   	  </div>


   	 <div class="mainer">
      <div class="container mt-5" style="padding: 0;">
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate"><i data-feather="plus"></i>Agregar Especificación</button>
      </div>
     
   	 	<table class="table col-md-12 container mt-2 text-center">
  				<thead class="table-dark">
    				<tr>
      				<th scope="col">Tipo</th>
      				<th scope="col">Cilindrada (Cc)</th>
      				<th scope="col">General (KM)</th>
              <th scope="col">Cubiertas (KM)</th>
              <th scope="col">Batería (Año)</th>
              <th scope="col">Eliminar</th>
    				</tr>
  				</thead>
  				<tbody id="tablabody">
    				
 				 </tbody>
			</table>
   	 </div>

   </div>
</div>

<!------------------------------------------------------------------modal----->

<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carga de Setting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
            <!---------------------------------------------------formulario------------>
                <form method="POST" action="../php/addEspecificaciones.php">
                    <div class="mb-3">
                       <div class="mb-3">
                          <label for="vehiculo" class="form-label">Tipo de vehículo</label>
                          <select class="form-control" name="vehiculo" required>
                              <option value="">Seleccionar opción</option>
                              <option value="Moto">Moto</option>
                              <option value="Auto">Auto</option>
                         </select>
                      </div>

                       <div class="mb-3">
                          <label for="tipo" class="form-label">Cilindrada</label>
                          <input type="number" class="form-control" name="tipo" required placeholder="solo números">
                       </div>

                       <div class="mb-3">
                          <label for="tipo" class="form-label">Service general</label>
                          <input type="number" class="form-control" name="service" required placeholder="Cantidad de kilómetros">
                       </div>

                       <div class="mb-3">
                          <label for="tipo" class="form-label">Service de cubiertas</label>
                          <input type="number" class="form-control" name="cubiertas" required placeholder="Cantidad de kilómetros">
                       </div>

                       <div class="mb-3">
                          <label for="tipo" class="form-label">Cambio de batería</label>
                          <input type="number" class="form-control" name="bateria" required placeholder="Cantidad de años">
                       </div>

                    </div>
                    <input type="submit" class="btn btn-primary" id="carga" value="Cargar"></input>
                </form>
            <!------------------------------------------------------------------------->
      </div>
    </div>
  </div>
</div>
<!---------------------------------------------------------------------------->

<script src="../js/jquery.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/scripts.js"></script>

<script>
    $(document).ready(function(){
        function load(){ //------------------------------obtiene filas de tabla
           $.ajax({
          url:'../php/getEspecificaciones.php',
          type: 'POST',
          data:{},
          success:function(data){
              $('#tablabody').append(data);
          }
        });
        }
        load();

        function deleter(){
            $('.deleter').click(function(){  //------------------------elimina filas----------
               let id=$(this).attr("name");
               console.log(id);
               /*$.ajax({
                  url:'../php/deleteEspecificaciones.php',
                  type: 'POST',
                  data:{id},}{+uhy}
                 success:function(data){
                        $('body').append('Elemento eliminado');
                        
                      }
                  });*/
              });
        }
        
    }); 
</script>

</body>
</html>