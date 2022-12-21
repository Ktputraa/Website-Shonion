<?php

include 'functions.php';

if (isset($_POST["tambah"])) {
   if (tambah_provinsi($_POST) > 0) {
      echo "
         <script>
            alert('Berhasil tambah data provinsi!');
            history.go(-1);
            // window.location.href='daftar_provinsi.php';
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

<body style="margin-top : 50px">
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
            <label for="login" class="slide login">Input Data Provinsi</label>

            <div class="slider-tab"></div>
         </div>
         <div class="form-inner">

            <form action="" method="POST" class="login" enctype="multipart/form-data">
               <div class="field">
                  <input type="text" placeholder="nama" name="nama" required>
               </div>
               <div class="field">
                  <input type="file" name="gambar" required>
               </div>

               <div class="field btn">
                  <div class="btn-layer"></div>
                  <button type="submit" name="tambah">Tambah</button>
               </div>
            </form>
         </div>
         </form>
      </div>
   </div>
   </div>
</body>

</html>