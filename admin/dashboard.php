<?php include('../config/koneksi.php'); ?>
<?php include('../config/config.php'); ?>


<?php include('control/dashboard_control.php') ?>

<?php require_once('../template/header.php');
require_once('../template/navbar.php'); 


$sql = "SELECT * FROM matakuliah";
$hasil = $koneksi->query($sql);
$koneksi->close();
?>

<div class="wrap-content">
    <?php require_once ('../template/sidebar.php'); ?>

        <div class="content">
        <div class="container">
            <h1 class="">Dashboard</h1>
            <div class="card">
                <div class="card-body">
                    Selamat datang
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../template/footer.php'); ?>