<?php
require_once('config.php');
?><!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lottery!</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <span class="navbar-brand">Lottery!</span>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
<?php
$nav_pages = ['index.php'=>'Home','buy.php'=>'Buy','account.php'=>'Account','market.php'=>'Claim Your Prize'];

foreach ($nav_pages as $key => $value) {
  $active = $key == basename($_SERVER['SCRIPT_NAME']) ? 'active' : '';

  echo <<<EOT
            <li class="nav-item $active">
              <a class="nav-link" href="$key">$value</a>
            </li>

EOT;
}
?>
        </ul>
        <span class="user-info">
<?php
if(isset($_SESSION['name']) && isset($_SESSION['money'])){
  $name = htmlspecialchars($_SESSION['name']);
  $money = '$' . $_SESSION['money'];
  echo <<<EOT
        <span id="username">$name</span>
        <span id="money">$money</span>

        <a class="nav-link" style="color:white;display:inline;" href="logout.php">Logout</a>          
EOT;

} else {
  echo '<a class="nav-link" style="color:white;" href="register.php">Register</a>';
}
          
        
?>
        </span>
      </div>
    </nav>

    <main role="main" class="container">
