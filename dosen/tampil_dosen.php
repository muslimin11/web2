<?php 
include('../config/koneksi.php');
include('../config/config.php');
require_once ('../template/header.php');
require_once ('../template/navbar.php');

$sql = "SELECT * FROM dosen";
$hasil = $koneksi->query($sql);
?>

<div class="wrap-content">
    <?php require_once ('../template/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Dosen</h1>
            <div class="card">
                <div class="card-body">
                <a href="tambah_dosen.php" class="btn btn-success mb-3">Tambah Dosen</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIDN</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no_urut = 1; 
                            if ($hasil->num_rows > 0) {
                                while ($row = $hasil->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $no_urut++; ?></td>
                                    <td><?php echo $row['nidn']; ?></td>
                                    <td><?php echo $row['gelar_depan']." ".$row['nama_lengkap'].", ".$row['gelar_belakang']; ?></td>
                                    <td><?php echo $row['jenis_kelamin']; ?></td>
                                    <td>
                                        <a href="edit_dosen.php?id_dosen=<?php echo $row['id_dosen'] ?>" class="btn btn-primary">Edit</a>|
                                        <a href="hapus_dosen.php?id_dosen=<?php echo $row['id_dosen'] ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                            ?>
                            <tr>
                                <td colspan="4">Belum Ada Data Dosen</td>
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../template/footer.php');?>