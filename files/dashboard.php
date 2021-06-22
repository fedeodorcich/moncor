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

     <form class="d-flex" action="../php/sessionDestroyer.php">
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
      				<th scope="col">Teléfono</th>
              <th scope="col">Service</th>
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
    let array=<?php echo json_encode($array);?>;
    console.log(array);

    $('.available').on('click',function(){

      let svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';

      //-------get all for patentes----
       let id = $(this).attr('id');
       let patente = array[id]['patente'];
       
       let json = [];
       let aux = [];
       let n = array.length;

       for (var i = 0; i < n; i++)
       {
        
          if(array[i]['patente']==patente)
          {
             json.push(array[i]);
             aux.push(i);
             $("#"+i+" svg").fadeOut(function(){
                 $("#"+i+" i").removeClass('hidden');
             });


          }
       }
       console.log(json);
         
       
      //-------------------------------

       
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