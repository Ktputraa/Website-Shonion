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
      

        <div class="sidebar-brand-text mx-3">ADMIN </div>
        
      </a>
      <hr class="sidebar-divider my-0">
      <hr class="sidebar-divider">
      <li class="nav-item">
        <!-- NAVLIST -->
        <ul style="font-weight : bolder">
          <a href="index.php">Dashboard</a> <br><br>
          <a href="petani.php" class="text-dark">Data Petani</a> <br><br>
        </ul>
        
        <!-- NAVLIST -->
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapsei-nner rounded">
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
          <button class="nav-open-btn" aria-label="open menu" data-nav-toggler></button>

          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">

          <a href="../../logout.php" class="btn btn-danger" onclick="return confirm('Yakin ingin logout ?');">Logout</a>
          <a href="petani.php" class="btn btn-secondary has-after"  style="background-color : #9824ce">Data Petani</a>
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