<?php
include('../config/koneksi.php');
include('../config/config.php');
require_once ('../template/header.php');
require_once ('../template/navbar.php');

?>

<div class="wrap-content">
    <?php require_once ('../template/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Mahasiswa</h1>
            <div class="card">
                <div class="card-body">
                <a href="tambah_mahasiswa.php" class="btn btn-success mb-3">Tambah Mahasiswa</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Prodi</th>
                                <th>Kelas</th>
                                <th>semester</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no_urut = 1;
                            $matakuliah = mysqli_query($koneksi,"SELECT * FROM mahasiswa 
                                INNER JOIN prodi ON mahasiswa.id_prodi=prodi.id_prodi
                            ");
                            foreach ($matakuliah as $row)  {
                            ?>
                                <tr>
                                    <td><?php echo $no_urut++; ?></td>
                                    <td><?php echo $row['nim']; ?></td>
                                    <td><?php echo $row['nama_lengkap']; ?></td>
                                    <td><?php echo $row['jenis_kelamin']; ?></td>
                                    <td><?php echo $row['nama_prodi']?></td>
                                    <td><?php echo $row['asal_kelas']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    <td>
                                        <a href="edit_mahasiswa.php?id_mahasiswa=<?php echo $row['id_mahasiswa'] ?>" class="btn btn-primary">Edit</a>|
                                        <a class="btn btn-danger" href="hapus_mahasiswa.php?id_mahasiswa=<?php echo $row['id_mahasiswa'] ?>">hapus</a>
                                    </td>
                                </tr>
                        <?php } ?>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../template/footer.php');?>