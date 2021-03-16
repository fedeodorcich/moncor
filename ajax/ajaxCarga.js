function cargaUser (user){
	$.ajax({
		url:'../php/addUser.php',
		type: 'POST',
		data:{user},
		success:function(data){
			$('.alert').fadeOut();
			$('.mainer').append(data);			
		}
	});
}
//--------------------------------------------------
function cargaEntidad (entidad){
	$.ajax({
		url:'../php/addEntidad.php',
		type: 'POST',
		data:{entidad},
		success:function(data){
			$('.alert').fadeOut();
			$('.mainer').append(data);
		}
	});
}
function CreateVehiculo(vehiculo){
	$.ajax({
		url:'../php/addVehiculos.php',
		type: 'POST',
		data:{vehiculo},
		success:function(data){
			console.log(data);
		}
	});
}