<?php
  require 'conn.php';
  require 'nav.php';
  session_start();
?>
<?php
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
                echo '<a href="" class="card-link">Edit</a><a href="#" class="card-link">Delete</a>';
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
