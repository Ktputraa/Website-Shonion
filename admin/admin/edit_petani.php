<?php
session_start();

include 'functions.php';

$id_petani = $_GET['id_petani'];
$email = $_SESSION['email'];

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('../../login.php');
       </script>";
  exit;
}

$petani = query("SELECT * FROM petani WHERE id_petani = $id_petani")[0];
$daerah = mysqli_query($conn, "SELECT * FROM daerah");

if (isset($_POST['edit'])) {

  if (edit_petani($_POST) > 0) {
    echo "<script>
       alert('Data Berhasil Diedit!');
       window.location.href='petani.php';
     </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Shonion</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#" style="background-color : #a19aa1">
        <div class="sidebar-brand-text mx-3">ADMIN</div>
      </a>
      <hr class="sidebar-divider my-0">
      <hr class="sidebar-divider">
      <li class="nav-item">
        <!-- NAVLIST -->
        <ul style="font-weight : bolder">
          <a href="index.php" class="text-dark">Dashboard</a> <br><br>
          <a href="petani.php">Data Petani</a> <br><br>
        </ul>
        <!-- NAVLIST -->
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <?php include 'navbar.php'; ?>
          </div>
        </div>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top" style="background-color : #9824ce">
          <ul class="navbar-nav ml-auto">
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">

          <h1>Petani</h1>
          <hr><br>

          <div class="head-label mt-2 p-3" style="background-color : #a160bf">
            Edit Data Petani
          </div>

          <!-- FORM -->

          <form class="" action="" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id_petani" value="<?= $petani['id_petani']; ?>">

            <div class="mt-4 mb-3 row p-2">
              <label for="staticEmail" class="col-sm-2 col-form-label">Foto Petani</label>
              <div class="col-sm-10">
                <center><img src="../../assets/imagesdb/<?= $petani["gambar"]; ?>" style="width: 100px; height: 100px"></center>
                <input type="file" class="form-control" name="gambar" value="<?= $jabatan['gambar']; ?>" required>
              </div>
            </div>

            <div class="mb-3 row p-2">
              <label class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="<?= $petani['nama']; ?>">
              </div>
            </div>

            <div class="mb-3 row p-2">
              <label class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" value="<?= $petani['alamat']; ?>">
              </div>
            </div>

            <div class="mb-3 row p-2">
              <label class="col-sm-2 col-form-label">No Telepon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="notelp" value="<?= $petani['notelp']; ?>">
              </div>
            </div>

            <div class="mb-3 row p-2">
              <label class="col-sm-2 col-form-label">Provinsi</label>
              <div class="col-sm-10">
                <select name="provinsi" class="form-control">
                  <option value="<?= $petani['provinsi']; ?>"><?= $petani['provinsi']; ?> (Data Saat Ini)</option>
                  <option value="-" disabled> -- Pilih Provinsi -- </option>
                  <?php foreach ($daerah as $d) : ?>
                    <option value="<?= $d['nama']; ?>"><?= $d['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="mb-3 row p-2">
              <label class="col-sm-2 col-form-label">Kabupaten</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="kabupaten" value="<?= $petani['kabupaten']; ?>">
              </div>
            </div>

            <div class="mb-3 row p-2">
              <label class="col-sm-2 col-form-label">Ketersediaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ketersediaan" value="<?= $petani['ketersediaan']; ?>">
              </div>
            </div>

            <div class="mb-3 row p-2">
              <label class="col-sm-2 col-form-label">Harga/Kg</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="harga" value="<?= $petani['harga']; ?>">
              </div>
            </div>

            <button name="edit" class="btn btn-primary px-3 " style="background-color : #9824ce">Simpan</button>
            <a href="petani.php" class="btn btn-danger px-3">Kembali</a>
          </form>

          <!-- FORM -->
        </div>
        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/ruang-admin.min.js"></script>
</body>

</html>