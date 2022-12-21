<?php
session_start();

include 'functions.php';

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('../../login.php');
       </script>";
  exit;
}

$email = $_SESSION['email'];

$petani = mysqli_query($conn, "SELECT * FROM petani");

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
  <style media="screen">
    .disp {
      display: flex;
    }

    .flex {
      flex-grow: 1;
    }
  </style>
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
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top" style="background-color :#9824ce">
          <ul class="navbar-nav ml-auto">
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">

        <a href="../../logout.php" class="btn btn-danger" onclick="return confirm('Yakin ingin logout ?');">Logout</a>
         <hr style="margin-block-end: 40px;">
        <!-- <h3>Petani</h3> -->

          <div class="head-label mt-5 p-3" style="background-color : #a160bf">

          Data Petani
          </div>

          <!-- TABEL -->

          <div class="table-responsive mt-5">
            <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">No Telepon</th>
                  <th scope="col">Provinsi</th>
                  <th scope="col">Kabupaten</th>
                  <th scope="col">Ketersediaan</th>
                  <th scope="col">Harga/Kg</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 0; ?>
                <?php foreach ($petani as $p) : ?>
                  <tr>
                    <th scope="row"><?php $i++;
                                    echo $i; ?></th>
                    <td> <img src="../../assets/imagesdb/<?= $p['gambar']; ?>" style="width: 100px; max-height: 100px;border-radius: 100%;"></td>
                    <td><?= $p['nama']; ?></td>
                    <td><?= $p['alamat']; ?></td>
                    <td><?= $p['notelp']; ?></td>
                    <td><?= $p['provinsi']; ?></td>
                    <td><?= $p['kabupaten']; ?></td>
                    <td><?= $p['ketersediaan']; ?></td>
                    <td><?= number_format($p['harga'], 0); ?></td>
                    <td>
                      <a href="edit_petani.php?id_petani=<?= $p['id_petani']; ?>" class="btn btn-primary " style="background-color : #9824ce">Edit </a> &nbsp;&nbsp;
                      <a href="delete_petani.php?id_petani=<?= $p['id_petani']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
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