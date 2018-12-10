<?php
  session_start();
  require 'conn.php';
  if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $discription = $_POST["discription"];
    $stock = $_POST["stock"];
    $username = $_SESSION["username"];
    $sql = "INSERT INTO product (productName, productDiscription, productStock, username)
    VALUES ('$name', '$discription', '$stock', '$username')";

    if (mysqli_query($conn, $sql)) {
      header("Location:index.php?success");
    }else {
      header("Location:index.php?error");
    }
  }
?>
