<?php
session_start();
require 'conn.php';
require 'nav.php';
require 'functions.php';

  if(isset($_GET['id'])) {
    $productID= $_GET['id'];
    //to prevent sql injections
    $stmt = $conn->prepare('SELECT * FROM product WHERE productID = ?');
    $stmt->bind_param('s', $productID);
    $stmt->execute();
    $result = $stmt->get_result();

    //if the username doesnt exist then exist
    if (mysqli_num_rows($result) == 0){
      header("Location:product.php?error");
      exit();
    }else {
      if ($row = mysqli_fetch_assoc($result)){
        echo '<div class="jumbotron">
          <h1 class="display-4">'.$row['productName'].'</h1>
          <p class="lead">'.$row['productDiscription'].'</p>
          <hr class="my-4">
          <p>Stock: '.$row['productStock'].'</p>
        </div>';
      }
    }
  }elseif (isset($_GET['error'])) {
    alert("danger", "Invalid product.");
  }elseif(isset($_GET['edit'])) {
    if (isset($_SESSION['username'])) {
      $productID = $_GET['edit'];
      $stmt = $conn->prepare('SELECT * FROM product WHERE productID = ?');
      $stmt->bind_param('s', $productID);
      $stmt->execute();
      $result = $stmt->get_result();

      //if the username doesnt exist then exist
      if (mysqli_num_rows($result) == 0){
        header("Location:product.php?error");
        exit();
      }else {
        if ($row = mysqli_fetch_assoc($result)){
          echo '<div class="container">
          <form method="POST" action="edit.php" class="card-body bg-light">
            <h3>Edit '.$row['productName'].'</h3>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Product Name</label>
                <input type="text" value="'.$row['productName'].'" name="name" class="form-control" id="name" placeholder="Name">
              </div>
              <div class="form-group col-md-6">
                <label for="stock">Product Stock</label>
                <input type="text" value="'.$row['productStock'].'" name="stock" class="form-control" id="stock" placeholder="Stock">
              </div>
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <textarea class="form-control" name="discription" rows="3">'.$row['productDiscription'].'</textarea>
            </div>
            <button type="submit" value="'.$row['productID'].'" name="editSubmit" class="btn btn-primary">Submit</button>
          </form>
          </div><br>';
        }
      }
    }else {
      header("Location:login.php");
    }
  }

  require 'footer.php';
?>
