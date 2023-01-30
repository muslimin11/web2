<?php
//memanggil folder
include('../config/koneksi.php');
include('../config/config.php');
require_once ('../template/header.php');
require_once ('../template/navbar.php');

// ambil data prodi
$query_prodi = "SELECT * FROM prodi";
$prodi = $koneksi->query($query_prodi);

if (isset($_POST['submit'])) {
    $nama_prodi = $_POST['nama_prodi'];

    // $sql = "INSERT INTO mahasiswa (nim, nama_lengkap, jenis_kelamin, id_prodi, asal_kelas, semester) VALUES ('".$nim."', '".$nama_lengkap."', '".$jenis_kelamin."', '".$id_prodi."', '".$asal_kelas."', '".$semester."')";
    $sql = "INSERT INTO prodi(nama_prodi) VALUES ('".$nama_prodi."')";
    $simpan = $koneksi->query($sql);

    if ($simpan) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data Gagal Disimpan";
    }

    $koneksi->close();
}
?>

<div class="wrap-content">
    <?php require_once ('../template/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Program Studi</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <div>
                                    <label class="mb-1" for="nama_prodi">Nama Program Studi</label>
                                    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                                        placeholder="Masukkan nama Program Studi" required>
                                    </div>
                                    <div class="mt-3">
                                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary mb-1">
                                        <a href="<?php echo $base_url ;?>/prodi/tampil_prodi.php" class="btn btn-danger">Kembali</a>
                                    </div>
                                    
                                </div>
                            </div>                     
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../template/footer.php');?>