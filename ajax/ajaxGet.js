function getUserLista (entidad,cant){
	$.ajax({
		url:'../php/getUsersLista.php',
		type: 'POST',
		data:{entidad},
		success:function(data){
			for (var i = 0; i < cant; i++) {
				$('#user'+i).append(data);
			}
		
		}
	});
}
function comparePatente(patente){
	$.ajax({
		url:'../php/getPatentes.php',
		type: 'POST',
		data:{patente},
		success:function(data){
			console.log(data);
			if(data==1){
				$('#patente').removeClass('is-valid');
				$('#patente').addClass('is-invalid');
				$('#texted').empty();
				$('#texted').removeClass('text-success');
				$('#texted').addClass('text-danger');
				$('#texted').text('La patente ya existe');
				
			}else{
				if(data==0)
				{
					$('#patente').removeClass('is-invalid');
					$('#patente').addClass('is-valid');
					$('#texted').empty();
					$('#texted').removeClass('text-danger');
					$('#texted').addClass('text-success');
					$('#texted').text('Patente válida');
				}
				else{
					$('#patente').removeClass('is-valid');
					$('#patente').addClass('is-invalid');
					$('#texted').empty();
					$('#texted').removeClass('text-success');
					$('#texted').addClass('text-danger');
					$('#texted').text('Patente vacía');
				}
				
			}
		}
	});
}