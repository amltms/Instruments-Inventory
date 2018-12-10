<?php
session_start();
require 'conn.php';
require 'functions.php';

if (isset($_POST['submit'])) {

  //The checkData functions strips any sql code from
  $username = checkData($_POST["username"]);
  $password = checkData($_POST["password"]);

  //to prevent sql injections
  $stmt = $conn->prepare('SELECT * FROM admin WHERE username = ?');
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();

  //if the username doesnt exist then exit
  if (mysqli_num_rows($result) == 0){
    header("Location:login.php?error");
    exit();
  //if username does exist then check the database hashed password with the user input password
  }elseif (mysqli_num_rows($result) == 1) {
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
