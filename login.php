<?php
@session_start();
$db = mysqli_connect("localhost", "root", "", "alhrfcju_db_elearning");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/ico" href="img/favicon.ico"/>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; E-Learning SMAN 10 BOGOR</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="stisla/assets/css/style.css">
  <link rel="stylesheet" href="stisla/assets/css/components.css">
</head>
<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="img/logo-sekolah2.png" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal"><span class="font-weight-bold">E-Learning SMAN 10</span></h4>
            <p class="text-muted">Silahkan login untuk masuk ke e-learning.</p>

            <?php
            if (@$_GET['page'] == '') { ?>
              <?php
              if (@$_POST['login']) {
                  $user = @mysqli_real_escape_string($db, $_POST['user']);
                  $pass = @mysqli_real_escape_string($db, $_POST['pass']);
                  $sql = mysqli_query($db, "SELECT * FROM tb_siswa WHERE username = '$user' AND password = md5('$pass')") or die($db->error);
                  $data = mysqli_fetch_array($sql);
                  if (mysqli_num_rows($sql) > 0) {
                      if ($data['status'] == 'aktif') {
                          @$_SESSION['siswa'] = $data['id_siswa'];
                          echo "<script>window.location='./';</script>";
                      } else {
                          echo '<div class="alert alert-warning">Login gagal, akun Anda sedang tidak aktif</div>';
                      }
                  } else {
                      echo '<div class="alert alert-danger">Login gagal, username / password salah, coba lagi!</div>';
                  }
              } ?>
              <?php
              } elseif (@$_GET['page'] == 'pengumuman') {
                  include "inc/pengumuman.php";
              } ?>
            <form method="POST" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="email">Username :</label>
                <input id="email" type="text" class="form-control" name="user" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Masukkan username Anda dengan benar !
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password :  </label>
                </div>
                <input id="password" type="password" class="form-control" name="pass" tabindex="2" required>
                <div class="invalid-feedback">
                  Masukkan password Anda dengan benar !
                </div>
              </div>

                <button name="login" type="submit" value="Login" class="btn btn-success btn-lg btn-icon icon-right" tabindex="4">
                  <i class="fas fa-sign-in-alt"></i> Login
                </button>

              <div class="mt-5 text-center">
                Belum memiliki akun? <a href="./?hal=daftar">Silahkan Daftar Terlebih Dahulu</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; 2020 E-Learning SMAN 10 BOGOR  | Made with 💙 By : ICT SMAN 10
            </div>

          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="stisla/assets/img/unsplash/login.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Selamat Datang Di E-Learning SMAN 10 BOGOR</h1>
                <h5 class="font-weight-normal text-muted-transparent">Jl. Pinang Raya Komp. Yasmin Sektor Vi</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div id="login-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Selamat Datang di E-learning SMAN 10</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <ul>
      <h6>Pentunjuk E-Learning</h6>
      <li>Silahkan klik link daftar untuk siswa yang belum mendaftar</li>
      <li>Bagi yang sudah mendaftar silahkan login dengan memasukan username dan password</li>
      <li>Jika ada hal yang perlu ditanyakan silahkan hubungi admin</li>
    </ul>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
             </div>
         </div>

     </div>
  </div>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="stisla/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="stisla/assets/js/scripts.js"></script>
    <script src="stisla/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script>
    $('#login-modal').modal('show');
    </script>
</body>
</html>
