<?php

include 'functions.php';

$daerah = mysqli_query($conn, "SELECT * FROM daerah");

if (isset($_POST['submit'])) {
   if (tambah_petani($_POST) > 0) {
      echo "
      <script>
         alert('Berhasil Tambah Data Petani!');
         window.location.href='Daftar Panen.php';
      </script>
      ";
   } else {
      echo mysqli_error($conn);
   }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title> Form Data Panen </title>
   <link rel="stylesheet" href="style2.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
   <div class="wrapper">
      <div class="title-text">
         <div class="title login">
            Formulir
         </div>
         <div class="title signup">

         </div>
      </div>
      <div class="form-container">
         <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Input Data Panen</label>

            <div class="slider-tab"></div>
         </div>
         <div class="form-inner">

            <form action="" method="POST" enctype="multipart/form-data" class="login">
               <div class="field">
                  <input type="file" placeholder="Foto Petani" name="gambar" required style="padding-top : 10px" s>
               </div>
               <div class="field">
                  <input type="text" placeholder="Nama" name="nama" required>
               </div>
               <div class="field">
                  <input type="text" placeholder="Alamat" name="alamat" required>
               </div>
               <div class="field">
                  <input type="text" placeholder="No Telepon" name="notelp" required>
               </div>

               <div class="field">
                  <select name="provinsi">
                     <option value="-" selected disabled> -- Pilih Provinsi -- </option>
                     <?php foreach ($daerah as $d) : ?>
                        <option value="<?= $d['nama']; ?>"><?= $d['nama']; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

               <div class="field">
                  <input type="text" placeholder="Kabupaten/Desa" name="kabupaten" required>
               </div>
               <div class="field">
                  <input type="text" placeholder="Ketersediaan" name="ketersediaan" required>
               </div>
               <div class="field">
                  <input type="number" placeholder="Harga Panen Per/Kg" name="harga" required>
               </div>
               <div class="pass-link">
               </div>
               <div class="field btn">
                  <div class="btn-layer"></div>
                  <button type="submit" name="submit"> Daftar </button>
               </div>

               <div class="signup-link">
                  Harap input data dengan benar, bila data tidak benar tidak akan di proses!!
               </div>

               <div class="signup-link">
                  <a href="index.php">Beranda</a>
               </div>
            </form>

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