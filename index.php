<?php
  require 'conn.php';
  require 'nav.php';
  require 'functions.php';
  session_start();
  if (isset($_SESSION["username"])) {
    if (isset($_GET['error'])) {
      alert("danger", "An error has occourred. Please try again.");
    }elseif (isset($_GET['success'])) {
      alert("success", "Product inserted.");
    }elseif (isset($_GET['delete'])) {
      alert("success", "Product deleted.");
    }elseif (isset($_GET['updated'])) {
      alert("success", "Product updated.");
    }
    echo '<div class="container">
      <form method="POST" action="insert_product.php" class="card-body bg-light">
        <h3>Insert Product</h3>
        <hr>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
          </div>
          <div class="form-group col-md-6">
            <label for="stock">Product Stock</label>
            <input type="text" name="stock" class="form-control" id="stock" placeholder="Stock">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Product Description</label>
          <textarea class="form-control" name="discription" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary">
      </form>
    </div><br>';
  }
  $sql = "SELECT * FROM product";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo '
        <a href="product.php?id='.$row["productID"].'">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">'.$row["productName"].'</h5>
              <p class="card-text">'.$row["productDiscription"].'</p>
              <h6 class="card-subtitle mb-2 text-muted">Stock: '.$row["productStock"].'</h6>';
              if (isset($_SESSION["username"])) {
                echo '<form method="POST" action="insert_product.php">
                  <hr>
                  <button type="submit" value="'.$row["productID"].'" name="edit" class="lbtn">Edit</button>
                  <button type="submit" value="'.$row["productID"].'" name="delete" class="lbtn">Delete</button>
                </form>';
              }
        echo '</div>
          </div>
        </a>';
      }
  } else {
      echo "<br> 0 results";
  }

  require 'footer.php';
?>
