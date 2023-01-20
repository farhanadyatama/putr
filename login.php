<?php
session_start();

if(isset($_SESSION["masuk"])) {
  header("Location: page_admin/index.php");
  exit;
}

// require "connection.php";
require 'function.php';

if(isset($_POST["masuk"])) {
  // $name = $_POST["name"];
  // $password = $_POST["password"];

  // $result = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name' AND password = '$password'");

  // cek name
  // if(mysqli_num_rows($result) === 1) {
  //   // cek password
  //   $row = mysqli_fetch_assoc($result);
  //   if (password_verify($password, $row["password"])) {
  //     header("Location: page_admin/index.php");
  //     exit;
  //   }
  // }

  // session_start();
  // $_SESSION['user'] = $result;
  // $_SESSION['name'] = $_POST['name'];
  // header("Location: page_admin/index.php");

  // $error = true;

  $name = $_POST["name"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name'");

  // cek username 
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])) {
      // set session 
      $_SESSION['masuk'] = true;

      $_SESSION['user'] = $result;
      $_SESSION['name'] = $_POST['name'];

      header("Location: page_admin/index.php");
      exit;
    }
  }

  $error = true;
}

if(isset($_POST["daftar"])) {
  // $name = $_POST["name2"];
  // $email = $_POST["email"];
  // $password = $_POST["password2"];

  // $result = mysqli_query($conn, "INSERT INTO user VALUES ('', '$name', '$email', '$password', '')");

  // header("Location: login.php");

  // $error = true;

  if(registrasi($_POST) > 0) {
    header("Location: login.php");
  } else {
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/login.css">

    <!-- Favicons -->
    <link href="assets/img/icon.png" rel="icon">
    <link href="assets/img/icon(2).png" rel="icon(2)">

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="assets/img/login.jpg" alt="">
      </div>

      <div class="back">
        <img class="backImg" src="assets/img/login.jpg" alt="">
      </div>
    </div>
      <div class="forms">
          <div class="form-content">
            <div class="login-form">
              <div class="title">Login</div>

              <?php if(isset($error) ) : ?>
                <p style="color: red; font-style: italic">nama / password salah</p>
              <?php endif; ?>

            <form action="" method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user" for="name"></i>
                  <input type="text" name="name" id="name" placeholder="Masukkan nama" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock" for="password"></i>
                  <input type="password" name="password" id="password" placeholder="Masukkan password" required>
                </div>
                <!-- <div class="text"><a href="#">Lupa password?</a></div> -->
                <div class="button input-box">
                  <input type="submit" name="masuk" value="Masuk">
                </div>
                <div class="text sign-up-text">Tidak punya akun? <label for="flip">Daftar sekarang</label></div>
              </div>
          </form>
        </div>

          <div class="signup-form" id="signup-form">
            <div class="title">Daftar</div>
          <form action="" method="post">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" name="name2" placeholder="Masukkan nama" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="Masukkan email" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password2" placeholder="Masukkan password" required>
                </div>
                <div class="button input-box">
                  <input type="submit" name="daftar" value="Daftar">
                </div>
                <div class="text sign-up-text">Sudah memiliki akun? <label for="flip">Masuk sekarang</label></div>
              </div>
        </form>
      </div>
  </div>
</body>
</html>