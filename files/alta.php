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

     <!--------------MENU SIDENAV-------------------->
   	<ul>
      <li>
        <a href="dashboard.php"><i data-feather="layers"></i>Panel General</a>
      </li>

      <li>
        <a href="" class="activa"><i data-feather="plus-square"></i>Alta de Vehículo</a>
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
   	 	  <div class="card col-md-6 col-12 container mt-1">
            <form class="p-2">
              <h3>Alta de vehículos</h3>
              <fieldset id="first"> <!----------------PRIMER FRAME DEL FORM-->
                 <div class="mb-3">
                  <label for="entidad" class="form-label">Entidad</label>
                    <select name="entidad" id="entidad" class="form-control">
                      <option value="none">Seleccionar entidad</option>
                      <?php require('../php/getEntidadesLista.php'); ?>
                    </select>
                  </div>

                <div class="row g-3">
                       <div class="mb-3 col">
                          <label for="patente" class="form-label">Patente</label>
                          <input type="text" class="form-control form-control-sm" id="patente" required placeholder="">
                          <small class="muted" id="texted">Ingrese patente sin espacios</small>
                       </div>

                       <div class="mb-3 col">
                          <label for="tipo" class="form-label">Tipo de vehículo</label>
                          <select name="tipo" id="tipo" class="form-control form-control-sm" required>
                              <option value="none">Seleccionar</option>
                              <option value="auto">Auto</option>
                              <option value="moto">Moto</option>
                          </select>
                        </div>

                         <div class="mb-3 col-md-12">
                          <label for="tipo" class="form-label">Setting</label>
                          <select name="tipo" id="cilindrada" class="form-control form-control-sm" required>
                              <option value="none">Seleccionar</option>
                              <?php require('../php/getEspecificacionesLista.php'); ?>
                          </select>
                        </div>
                </div>

                <div class="row g-3">
                     <div class="mb-3 col">
                        <label for="kminiciales" class="form-label">Kilómetros</label>
                        <input type="number" class="form-control form-control-sm" id="kminiciales" required placeholder="Solo números">
                     </div>
                     <div class="mb-3 col">
                        <label for="kmdiarios" class="form-label">Km Diarios</label>
                        <input type="number" class="form-control form-control-sm" id="kmdiarios" required placeholder="Solo números">
                     </div>
                </div>
               
              <a type="submit" class="btn btn-primary" id="siguiente">Siguiente</a>
              </fieldset>

              <fieldset id="second" style="display: none;"><!----------------SEGUNDO FRAME DEL FORM---->
                <div id="userspace"><!-------------------cantidad de usuarios---->
                     <div class="mb-3 col-md-4 container">
                        <label for="cant" class="form-label">Cantidad de usuarios</label>
                        <input type="number" class="form-control form-control-sm" id="cant" required placeholder="Solo números">
                        <a class="btn btn-success btn-sm mb-3 col-md-12" id="adduser" disabled>Agregar usuarios</a>
                     </div>
                     <div id="userlist" class="row">
                       
                     </div>
                </div>                

                 <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="check" required>
                    <label class="form-check-label" for="check">Confirmar operación</label>
                 </div>
                   <a type="submit" class="btn btn-light" id="atras">Atras</a>
                   <button type="submit" class="btn btn-primary" disabled id="carga">Cargar</button>
              </div>
            
            
            </fieldset>
            </form>
   	 </div>

   </div>
</div>




<script src="../js/jquery.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/scripts.js"></script>
<script src="../ajax/ajaxCarga.js"></script>
<script src="../ajax/ajaxGet.js"></script>

<script>
  $(document).ready(function(){ //-------------validar patente
    $('#patente').keyup(function(){
        let item = $("#patente");
        let letters = item.val().replace(/ /g, "").toUpperCase();
        item.val(letters);
        comparePatente($('#patente').val());
    });
    var ArrayUser = [];
     //------------------------------------------------------------------------------
    $('#check').on('click',function(){//-------------------checker
      if($(this).is(':checked')){
        $('#carga').prop("disabled", false); 
      }else{
        $('#carga').prop("disabled", true);
      }
    });
     //-----------------------------------------------------------------------------
    $('#siguiente').click(function(){
      $('#first').fadeOut(function(){
        $('#second').fadeIn();//----pasa al frame 2
      });
    });
     //----------------------------------------------------------------------------
    $('#atras').click(function(){
      $('#second').fadeOut(function(){
        $('#first').fadeIn();//----vuelve al frame 1
      });
    });
    //----------------------------------------------------------------------------
    $('#adduser').on('click',function(){
     //--crea selects segun la cantidad ingresada
      $('.userframe').empty().fadeOut();
      let cant = $('#cant').val();
      if(cant>0)
      {
        for (let i = 0; i < cant; i++) {
           let userframe='<div class="col-md-6 g-3 userframe mb-3">'+
                    '<div class="mb-3 ">'+
                    '<select name="user" id="user'+i+'" class="form-control">'+
                      '<option value="none">Seleccionar Usuario</option>'+
                     
                    '</select>'+
                  '</div>';
          $('#userlist').append(userframe).fadeIn();
        }
         getUserLista($('#entidad').val(),cant);
      }
    });
     //---------------------------------------------------------------------------
     $('#carga').on('click',function(){
        event.preventDefault();
        let cant = document.getElementsByClassName("userframe").length; // se obtiene la cantidad de campos de usuario
        console.log(cant);
        for (var j = 0; j < cant; j++) {
          ArrayUser[j] = $('#user'+j).val(); // se obtiene el valor de cada campo y se almacena en un array

        }
        console.log(ArrayUser);
        // se crea un json con los datos del formulario
        let vehiculo = {
          "patente": $('#patente').val(),
          "cilindrada": $('#cilindrada').val(),
          "entidad": $('#entidad').val(),
          "vehiculo": $('#tipo').val(),
          "kminiciales": $('#kminiciales').val(),
          "kmdiarios": $('#kmdiarios').val(),
          "usuarios": ArrayUser
        }
        CreateVehiculo(vehiculo);
     });
  });
</script>


</body>
</html>