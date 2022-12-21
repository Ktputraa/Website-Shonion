<?php
require 'functions.php';
$id = $_GET["id_petani"];
if (delete_petani($id) > 0 ) {
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'petani.php';
		</script>
	";
    } else {
	echo "
		<script>
			alert('Data gagal dihapus!');
		</script>
	";
	}
 ?>
