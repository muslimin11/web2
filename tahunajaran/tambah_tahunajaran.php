<?php
//memanggil folder
include "../config/config.php";
include "../config/koneksi.php";
require_once ('../template/header.php');
require_once ('../template/navbar.php');

// ambil data prodi
$query_prodi = "SELECT * FROM tahun_ajaran";
$prodi = $koneksi->query($query_prodi);

if (isset($_POST['submit'])) {
    $keterangan = $_POST['keterangan'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO tahun_ajaran(keterangan, semester) VALUES ('".$keterangan."', '".$semester."')";
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
            <h1 class="">Tahun Ajaran</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Masukkan Keterangan" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="semester">Semester</label>
                                    <select  class="form-control" id="semester" name="semester">
                                        <option value="ganjil">Ganjil</option>
                                        <option value="genap">Genap</option>
                                </select>
                                </div>
                                <div>
                                <input type="submit" name="submit" value="Simpan" class="btn btn-primary mb-1">
                                <a href="<?php echo $base_url ;?>/tahunajaran/tampil_tahunajaran.php" class="btn btn-danger">Kembali</a> 
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