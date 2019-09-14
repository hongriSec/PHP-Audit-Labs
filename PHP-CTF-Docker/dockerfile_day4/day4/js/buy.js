function buy(){
	$('#wait').show();
	$('#result').hide();
	var input = $('#numbers')[0];
	if(input.validity.valid){
		var numbers = input.value;
		$.ajax({
		  method: "POST",
		  url: "api.php",
		  dataType: "json",
		  contentType: "application/json", 
		  data: JSON.stringify({ action: "buy", numbers: numbers })
		}).done(function(resp){
			if(resp.status == 'ok'){
				show_result(resp);
			} else {
				alert(resp.msg);
			}
		})
	} else {
		alert('invalid');
	}
	$('#wait').hide();
}

function show_result(resp){
	$('#prize').text(resp.prize);
	var numbers = resp.numbers;
	var win_numbers = resp.win_numbers;
	var numbers_result = '';
	var win_numbers_result = '';
	for(var i=0; i<7; i++){
		win_numbers_result += '<span class="number-ball number-ball-red">' + win_numbers[i] + '</span>';
		if(numbers[i] == win_numbers[i]){
			numbers_result += '<span class="number-ball number-ball-red">' + numbers[i] + '</span>';
		} else {
			numbers_result += '<span class="number-ball number-ball-gray">' + numbers[i] + '</span>';
		}
	}
	$('#win').html(win_numbers_result);
	$('#user').html(numbers_result);
	$('#money').text(resp.money);
	$('#result').show();
	$('#numbers').select()
}

$(document).ready(function(){
	$('#btnBuy').click(buy);	
	$('form').submit(function( event ) {
	  buy();
	  return false;
	});
})


