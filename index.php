<?php
  require('conn.php');
?>
<?php
  $sql = "SELECT * FROM product";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo '
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">'.$row["productName"].'</h5>
              <p class="card-text">'.$row["productDiscription"].'</p>
              <h6 class="card-subtitle mb-2 text-muted">Stock: '.$row["productStock"].'</h6>';
              if (isset($loggedIn)) {
                echo '<a href="#" class="card-link">Edit</a><a href="#" class="card-link">Delete</a>';
              }
        echo '</div>
          </div>';
      }
  } else {
      echo "<br> 0 results";
  }


?>
