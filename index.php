<?php 

	@ob_start();
	session_start();

	if(!empty($_SESSION['admin'])){
		require 'config/koneksi.php';
		
			include 'admin/dashboard.php';
				if(!empty($_SESSION['siswa'])){
					include 'siswa/dashboard.php';
				};
	}else{
		echo '<script>window.location="login.php";</script>';
	}
?>