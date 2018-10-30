<?php
  require 'conn.php';
  require 'nav.php';
?>
  <div class="container">
    <br>
    <?php
    if(isset($_GET['error'])) {
      echo '<div class="alert alert-danger" role="alert">
        Invalid username or password.
      </div>';
    }
    ?>
    <form method="POST" action="login_check.php">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username"aria-describedby="usernameHelp" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      </div>
      <input name="submit" type="submit" class="btn btn-primary">
    </form>
  </div>
<?php require 'footer.php'; ?>
