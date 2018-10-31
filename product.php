<?php
require 'conn.php';
require 'nav.php';

  if(isset($_GET['id'])) {
    $productId = $_GET['id'];
    //to prevent sql injections
    $stmt = $conn->prepare('SELECT * FROM product WHERE productID = ?');
    $stmt->bind_param('s', $productId);
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
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>';
      }
    }
  }elseif (isset($_GET['error'])) {
    echo '<div class="alert alert-danger" role="alert">
      Invalid Product.
    </div>';
  }

  require 'footer.php';
?>
