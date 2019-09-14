<?php include('check_register.php');include('header.php'); ?>


<h2>User account</h2>
<ul>
<?php
$name = htmlspecialchars($_SESSION['name']);
$money = '$' . $_SESSION['money'];
echo <<<EOT
<li>Username: $name</li>
<li>Money: $money</li>
EOT;

?>
	
</ul>

<?php include('footer.php'); ?>