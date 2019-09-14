<?php include('check_register.php');include('header.php'); ?>

<style type="text/css">
.pricing-header {
  max-width: 700px;
}

.card-deck .card {
  min-width: 220px;
}

.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }

.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
</style>
<div id="info"><div class="alert alert-info">Notice: You are offered a huge discount!</div></div>
<h2>All items</h2>
<div class="row">
	<div class="card mb-4 box-shadow">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Flag</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$<?php echo $flag_price; ?></h1>
        <ul class="list-unstyled mt-3 mb-4">
        	<li>On Sale</li>
        	<li>buy the flag if you can</li>
        </ul>
        <button type="button" id="btnBuyFlag" class="btn btn-lg btn-block btn-success">Buy</button>
      </div>
    </div>
</div>



<script type="text/javascript">
function buy_flag(){
	$.ajax({
	  method: "POST",
	  url: "api.php",
	  dataType: "json",
	  contentType: "application/json", 
	  data: JSON.stringify({ action: "flag" })
	}).done(function(resp){
		if(resp.status == 'ok'){
			$('#money').text(resp.money);
			$('#info').html('<div class="alert alert-success">' + resp.msg +'</div>');
		} else {
			$('#info').html('<div class="alert alert-danger">' + resp.msg +'</div>');
		}
	})
}


$(document).ready(function(){
	$('#btnBuyFlag').click(buy_flag);	
	$('form').submit(function( event ) {
	  buy_flag();
	  return false;
	});
})
</script>


<?php include('footer.php'); ?>