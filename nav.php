<?php
  session_start();
  if (isset($_GET['logout'])){
    session_destroy();
    header("Location:index.php");

  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Inventory System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Music Store</a>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Admin</a>
        </li>
      </ul>
      <span class="navbar-text">
        <?php
        if (isset($_SESSION["username"])) {
          echo '<p>Logged in as '.$_SESSION["username"]. '  <a class="btn btn-outline-primary" href="?logout">Logout</a></p>';
        }
         ?>
      </span>
    </div>
  </nav>
  <br>
  <div class="container-fluid">
