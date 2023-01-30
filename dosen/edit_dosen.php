<?php
//memanggil folder
include('../config/koneksi.php');

require_once ('../template/header.php');
require_once ('../template/navbar.php');

$id_dosen = isset($_GET['id_dosen']) ? $_GET['id_dosen'] : "";

if ($id_dosen == '') {
    echo "Tidak ada id";
} else {
    $sql = "SELECT * FROM dosen WHERE id_dosen=".$id_dosen."";
    $hasil = $koneksi->query($sql);

    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_object();
        $nidn = $data->nidn;
        $nama_lengkap = $data->nama_lengkap;
        $gelar_depan = $data->gelar_depan;
        $gelar_belakang = $data->gelar_belakang;
    } else {
        echo "Data tidak ditemukan";
    }

    if (isset($_POST['submit'])) {
        $nidn = $_POST['nidn'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $gelar_depan = $_POST['gelar_depan'] ? $_POST['gelar_depan'] : "";
        $gelar_belakang = $_POST['gelar_belakang'];

        $query_update = "UPDATE dosen 
                SET nidn='".$nidn."', 
                nama_lengkap='".$nama_lengkap."', 
                gelar_depan='".$gelar_depan."',
                gelar_belakang='".$gelar_belakang."'  
                WHERE id_dosen=".$id_dosen."
                ";

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
            <h1 class="">Dosen</h1>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        placeholder="Masukkan nama lengkap Anda" value="<?php echo isset($nama_lengkap) ? $nama_lengkap : ""; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control" id="nidn" name="nidn"
                                        placeholder="Masukkan NIM Anda" value="<?php echo isset($nidn) ? $nidn : ""; ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="gelar_depan">Gelar Depan</label>
                                    <input type="text" class="form-control" id="gelar_depan" name="gelar_depan"
                                        placeholder="Masukkan Gelar Depan Anda" value="<?php echo isset($gelar_depan) ? $gelar_depan : ""; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="gelar_belakang">Gelar Belakang</label> 
                                    <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang"
                                        placeholder="Masukkan Gelar Belakang Anda" value="<?php echo isset($gelar_belakang) ? $gelar_belakang : ""; ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="jenis_kelamin">jenis_kelamin</label> , 
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option> Laki - Laki </option>
                                            <option> Perempuan </option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        
                        
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <a href="tampil_dosen.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('../template/footer.php');?>