<?php
//memanggil folder
include('../config/koneksi.php');

require_once ('../template/header.php');
require_once ('../template/navbar.php');

$id_prodi = isset($_GET['id_prodi']) ? $_GET['id_prodi'] : "";

if ($id_prodi == '') {
    echo "Tidak ada id";
} else {
    $sql = "SELECT * FROM prodi WHERE id_prodi=".$id_prodi."";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_object();
        $nama_prodi = $data->nama_prodi;
    } else {
        echo "Data tidak ditemukan";
    }

    if (isset($_POST['submit'])) {
        $nama_prodi = $_POST['nama_prodi'];

        $query_update = "UPDATE prodi 
        SET nama_prodi='".$nama_prodi."' WHERE id_prodi='".$id_prodi."'";

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
            <h1 class="">prodi</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama_prodi">Nama prodi</label>
                                    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi"
                                        placeholder="Masukkan nama prodi" value="<?php echo isset($nama_prodi) ? $nama_prodi : ""; ?>">
                                </div>
                            </div>
                            
                        </div>
                        
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a href="<?php echo $base_url ;?>/prodi/tampil_prodi.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../template/footer.php');?>