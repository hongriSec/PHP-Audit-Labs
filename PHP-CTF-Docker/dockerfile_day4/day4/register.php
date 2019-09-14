<?php include('header.php'); ?>

<h2>Register</h2>
<p>Register is so simple that you even don't need a password!</p>
<!--
	Of course, you can not login after logout.
-->

<form method="POST">
	<input type="text" name="name" id="name" minlength="1" required placeholder="username">
	<button type="button" id="btnRegister">Register</button>
</form>
<script type="text/javascript" src="js/register.js"></script>

<?php include('footer.php'); ?>