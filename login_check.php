<?php
session_start();
require 'conn.php';

function checkData($data){
  $data = strip_tags($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = trim($data);
  return $data;
}

if (isset($_POST['submit'])) {

  $username = checkData($_POST["username"]);
  $password = checkData($_POST["password"]);

  //to prevent sql injections
  $stmt = $conn->prepare('SELECT * FROM admin WHERE username = ?');
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();

  //if the username doesnt exist then exist
  if (mysqli_num_rows($result) == 0){
    header("Location:login.php?error");
    exit();
  }else {
    if ($row = mysqli_fetch_assoc($result)){
      $hashedCheck = password_verify($password, $row['password']);
      if ($hashedCheck == false){
        header("Location:login.php?error");
        exit();
      }elseif ($hashedCheck == true) {
        $_SESSION["username"] = $username;
        header("Location:index.php");
      }
    }
  }
}else {
  header("Location:login.php?error");
  exit();
}
?>
