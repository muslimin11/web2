<?php
//memanggil folder
include('../config/koneksi.php');

require_once ('../template/header.php');
require_once ('../template/navbar.php');

$id_tahun_ajaran = isset($_GET['id_tahun_ajaran']) ? $_GET['id_tahun_ajaran'] : "";

if ($id_tahun_ajaran == '') {
    echo "Tidak ada id";
} else {
    $sql = "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran=".$id_tahun_ajaran."";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_object();
        $keterangan = $data->keterangan;
        $semester = $data->semester;
    } else {
        echo "Data tidak ditemukan";
    }

    if (isset($_POST['submit'])) {
        $keterangan = $_POST['keterangan'];
        $semester = $_POST['semester'];

        $query_update = "UPDATE tahun_ajaran 
        SET keterangan='".$keterangan."', semester='".$semester."' WHERE id_tahun_ajaran='".$id_tahun_ajaran."'";

        $update = $koneksi->query($query_update);

        if ($update) {
            echo "Data berhasil disimpan";
        } else {
            echo "Data Gagal Disimpan";
        }

        $koneksi->close();
    }
}
?>

<div class="wrap-content">
    <?php require_once ('../template/sidebar.php'); ?>

    <div class="content">
        <div class="container">
            <h1 class="">Tahunajaran</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="keterangan">Nama tahun ajaran</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Masukkan tahunajaran" value="<?php echo isset($keterangan) ? $keterangan : ""; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="semester">Semester</label> 
                                    <select class="form-control" name="semester" id="semester">
                                        <option value="ganjil"> Ganjil </option>
                                        <option value="genap"> Genap </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a href="<?php echo $base_url ;?>/tahunajaran/tampil_tahunajaran.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../template/footer.php');?>