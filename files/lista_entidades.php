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
        <a href="lista_entidades.php" class="activa"><i data-feather="home"></i>Entidades</a>
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

        <h2 class="text-center">Lista de entidades</h2>

        <div class="container mt-5" style="padding: 0;">
           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate"><i data-feather="plus"></i>Agregar Entidad</button>
        </div>


      <table class="table col-md-4 container mt-2 text-center">
          <thead class="table-dark">
            <tr>
              <th scope="col">ID</th>
              <th>Nombre</th>
              <th>Vehículos</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                require('../php/getEntidadesTabla.php');
             ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Carga de Entidad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
            <!---------------------------------------------------formulario------------>
                <form method="POST" action="../php/addEntidad.php">
                    <div class="mb-3">
           
                       <div class="mb-3">
                          <label for="entidad" class="form-label">Nombre de entidad</label>
                          <input type="text" class="form-control" name="entidad" required placeholder="Solo texto" id="entidad">
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
<script src="../ajax/ajaxCarga.js"></script>
<script src="../js/scripts.js"></script>

<script>
  $(document).ready(function(){
    $('#cargar').on('click',function(){
      event.preventDefault();
      cargaEntidad($('#nombre').val());
    });
  });
</script>

</body>
</html>