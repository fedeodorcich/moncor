function login(user,pass){
	$.ajax({
		url:'./php/login.php',
		type: 'POST',
		data:{user,pass},
		success:function(data){
			console.log(data);
			if(data==1)
			{
				window.location.href="files/dashboard.php";
			}
			else
			{
				$('body').append(data);
			}
		},
		error:function(data){
			console.log("hubo un error, contactar al servicio técnico");
		}
	});
}