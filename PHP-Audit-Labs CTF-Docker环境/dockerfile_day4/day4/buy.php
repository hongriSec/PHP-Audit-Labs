<?php include('check_register.php');include('header.php'); ?>


<h2>Buy a lottery!</h2>

<form method="POST">
<input type="text" name="numbers" id="numbers" minlength="7" maxlength="7" pattern="\d{7}" required placeholder="7 numbers">
<button type="button" id="btnBuy">Buy!</button>
</form>
<script type="text/javascript" src="js/buy.js"></script>
<p id="wait" class="alert alert-info" style="display: none;">Please wait...</p>
<div id="result" style="display: none;">
	<p id="info" class="alert alert-info">Prize: <span id="prize"></span></p>
	<p>
		<span style="width: 10em; display: inline-block;">Winning numbers:</span>
		<div id="win">

		</div>
	</p>
	<p>
		<span style="width: 10em; display: inline-block;">Your numbers:</span>
		<div id="user">
			<span class="number-ball number-ball-red">1</span>
			<span class="number-ball number-ball-gray">6</span>
		</div>
	</p>
</div>

<?php include('footer.php'); ?>