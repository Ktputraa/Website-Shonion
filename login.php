<?php
session_start();
include 'functions.php';

$error = false;

if (isset($_POST['regis'])) {
   if (registrasi($_POST) > 0) {
      echo "";
   } else {
      mysqli_error($conn);
   }
}


if (isset($_POST["login"])) {

   $email = $_POST["email"];
   $password = $_POST["password"];

   $admin = query("SELECT * FROM admin");
   foreach ($admin as $adm) {
   }

   $user = query("SELECT * FROM user");
   foreach ($user as $us) {
   }


   // Login Admin
   if ($email == $adm["email"]) {
      $result = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
      if (mysqli_num_rows($result) === 1) {

         $row = mysqli_fetch_assoc($result);
         if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["admin"] = true;
            $_SESSION["email"] = $email;
            echo "<script>alert('berhasil login!')</script>";
            echo "<script>window.location.replace('admin/admin/index.php')</script>";
            // header("Location:admin\admin\index.php");
            exit;
         }
      }
   }
   // Login User
   else if ($email == $us["email"] || $us["role"] == "user") {
      $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");


      if (mysqli_num_rows($result) === 1) {


         $row = mysqli_fetch_assoc($result);
         if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;
            $_SESSION["user"] = true;
            $_SESSION["email"] = $email;
            echo "<script>alert('berhasil login!')</script>";
            echo "<script>window.location.replace('index.php')</script>";
            // header("Location: index.php");
            exit;
         }
      }
   }

   $error = true;
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title> Form Login dan Registrasi</title>
   <link rel="stylesheet" href="style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


   <div class="wrapper">
      <?php if ($error == true) : ?>
         <center><span style="color : red; background-color : white; padding: 5px; border-radius: 5px;">Username / Password Salah!</span></center>
      <?php endif; ?>
      <div class="title-text">
         <div class="title login">
            Login
         </div>
         <div class="title signup">
            Registrasi
         </div>
      </div>
      <div class="form-container">
         <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Registrasi
            </label>
            <div class="slider-tab"></div>
         </div>
         <div class="form-inner">

            <form action="" method="POST" class="login">
               <div class="field">
                  <input type="email" placeholder="Email" required name="email">
               </div>
               <div class="field">
                  <input type="password" placeholder="Password" required name="password">
               </div>
               <div class="pass-link">

               </div>
               <div class="field btn">
                  <div class="btn-layer"></div>
                  <button type="submit" name="login"> Login </button>

               </div>

               <div class="signup-link">
                  Belum Punya Akun? <a href="">Daftar</a>
               </div>
               <div class="signup-link">
                  <a href="index.php">Beranda</a>
               </div>
            </form>

            <form action="" class="signup" method="POST">

               <div class="field">
                  <input type="email" placeholder="Email" name="email" required>
               </div>
               <div class="field">
                  <input type="password" placeholder="Password" name="password" required>
               </div>
               <div class="field">
                  <input type="password" placeholder="Confirm Password" name="password2" required>
               </div>

               <div class="field btn">
                  <div class="btn-layer"></div>
                  <button type="submit" name="regis"> Daftar </button>
               </div>
            </form>

         </div>
      </div>
   </div>
   <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (() => {
         loginForm.style.marginLeft = "-50%";
         loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (() => {
         loginForm.style.marginLeft = "0%";
         loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (() => {
         signupBtn.click();
         return false;
      });
   </script>
</body>

</html>