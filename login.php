<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/jurnal.css">
    <title>Login Jurnal Absensi Unuha</title>
    <style>
            .logo-login {
            max-height: 140px;
            margin-bottom: 15px;
            }
    </style>
</head>
<body class="bg-success">
        <div class="container">
        <!-- Outer Row -->
    <div class="row justify-content-center">
            <div class="col-md-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-3">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                    <div class="text-center">
                        <img src="asset/img/logo_unuha.png" class="logo-login" alt="logo unuha">
                        <h1 class="h4 text-gray-900">Aplikasi Jurnal Absensi</h1>
                        <h1 class="h4 text-gray-900 mb-4"><b>Universitas Nurul-Huda</b></h1>
                        <?php 
                        session_start();                        
                        if(isset($_SESSION['pesan_registrasi'])) { ?>
                        <div class="alert alert-success">
                        <?= $_SESSION['pesan_registrasi'] ?>
                        </div>
                        <?php }                         
                        if(isset($_SESSION['login_error'])) { ?>
                        <div class="alert alert-danger">
                        <?= $_SESSION['login_error'] ?>
                        </div>
                        <?php }                         
                        session_destroy();                        
                        ?>
                    </div>
                    <form class="user" action="logincontrol.php" method="POST">
                        <div class="form-group mb-3 row">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username...">
                        </div>
                        <div class="form-group mb-3 row">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <button type="submit" name="btn_login" value="login" href="" class="btn btn-primary">
                        Login
                        </button>
                    </form>
                    <hr>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
<script src="../asset/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>