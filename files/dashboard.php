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
   	 	<table class="table col-md-12 container mt-5">
  				<thead class="table-dark">
    				<tr>
      				<th scope="col">Patente</th>
      				<th scope="col">Usuario</th>
      				<th scope="col">Km Totales</th>
      				<th scope="col">Teléfono</th>
      				<th class="text-center" scope="col">Enviar mail</th>
    				</tr>
  				</thead>
  				<tbody>
    				<?php require('../php/updateDate.php'); ?>
 				 </tbody>
			</table>
   	 </div>

   </div>
</div>




<script src="../js/jquery.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/scripts.js"></script>


<script>
  $(document).ready(function(){
    let array = <?php echo json_encode($array);?>;
    $('.available').on('click',function(){
       let id = $(this).attr('id');
       let json = array[id];
       console.log();
          $.ajax({
            url:'../php/mailer.php',
            type: 'POST',
            data:{json},
            success:function(data){
               console.log(data);
              }
            });
    });
  });

</script>

</body>
</html>