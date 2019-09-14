function register(){
	var input = $('#name')[0];
	if(input.validity.valid){
		var name = input.value;
		$.ajax({
		  method: "POST",
		  url: "api.php",
		  dataType: "json",
		  contentType: "application/json", 
		  data: JSON.stringify({ action: "register", name: name })
		}).done(function(resp){
			if(resp.status == 'ok'){
				location.href='buy.php';
			} else {
				alert(resp.msg);
			}
		})
	} else {
		alert('invalid');
	}
}


$(document).ready(function(){
	$('#btnRegister').click(register);	
	$('form').submit(function( event ) {
	  register();
	  return false;
	});
})


