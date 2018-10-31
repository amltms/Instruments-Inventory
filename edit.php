<?php
require 'conn.php';
if(isset($_POST['editSubmit'])) {
  $productID = $_POST['editSubmit'];
  $name = $_POST["name"];
  $discription = $_POST["discription"];
  $stock = $_POST["stock"];
  $username = $_SESSION["username"];

  $sql = "UPDATE product SET productName='$name', productStock='$stock',
  productDiscription = '$discription' WHERE productID=$productID";

  if (mysqli_query($conn, $sql)) {
      header("Location:index.php?updated");
  } else {
      header("Location:index.php?error");
  }
}

?>
