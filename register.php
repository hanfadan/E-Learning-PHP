<?php
@session_start();
$db = mysqli_connect("localhost", "root", "", "alhrfcju_db_elearning");
?>
<script type="text/javascript">
function Angkasaja(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/ico" href="img/favicon.ico"/>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Daftar &mdash; E-Learning SMAN 10 BOGOR</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="stisla/assets/css/style.css">
    <link rel="stylesheet" href="stisla/assets/css/components.css">
</head>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="img/logo-sekolah2.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

  <div class="card card-success">
    <div class="card-header"><h4>Registrasi Siswa</h4></div>
            <?php
            if(@$_GET['page'] == '') { ?>


                    <div class="form-group">
                        <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                            NIS :<input type="text" name="nis" class="form-control" maxlength="16" minlength="16" required onkeypress="return Angkasaja(event)"/>
                            </div>
                            <div class="form-group col-md-6">
                            Nama Lengkap* : <input type="text" name="nama_lengkap" class="form-control" required />
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                            Tempat Lahir* : <input type="text" name="tempat_lahir" class="form-control" required />
                          </div>
                          <div class="form-group col-md-6">
                            Tanggal Lahir* : <input type="date" name="tgl_lahir" class="form-control" required />
                            </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            Agama* :
                            <select name="agama" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            Jenis Kelamin* :
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            </div>
                            </div>
                            Alamat* : <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            <div class="form-row">
                              <div class="form-group col-md-4">
                            Kelas* :
                            <select name="kelas" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_kelas = mysqli_query($db, "SELECT * from tb_kelas") or die ($db->error);
                                while($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                    echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                                } ?>
                            </select>
                            </div>
                            <div class="form-group col-md-4">
                            Tahun Masuk* :
                            <select name="thn_masuk" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                for ($i = 2025; $i >= 2000; $i--) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                } ?>
                            </select>
                            </div>
                            <div class="form-group col-md-2">
                            Foto : <input type="file" name="gambar" class="form-control" />
                            </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                            Username* : <input type="text" name="user" class="form-control" required />
                            </div>
                            <div class="form-group col-md-6">
                            Password* : <input type="password" name="pass" class="form-control" required />
                            </div>
                            </div>
                            <div class="form-group mb-0">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                  I agree with the terms and conditions
                                </label>
                              </div>
                            </div>
                            </div>
                            <div class="card-footer">
                            <input type="submit" name="daftar" value="Daftar" class="btn btn-success btn-lg btn-block">
                            </div>
                        </form>
                        <?php
                        if(@$_POST['daftar']) {
                            $nis = @mysqli_real_escape_string($db, $_POST['nis']);
                            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
                            $tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
                            $tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
                            $jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
                            $agama = @mysqli_real_escape_string($db, $_POST['agama']);
                            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
                            $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
                            $thn_masuk = @mysqli_real_escape_string($db, $_POST['thn_masuk']);
                            $user = @mysqli_real_escape_string($db, $_POST['user']);
                            $pass = @mysqli_real_escape_string($db, $_POST['pass']);

                            $sumber = @$_FILES['gambar']['tmp_name'];
                            $target = 'img/foto_siswa/';
                            $nama_gambar = @$_FILES['gambar']['name'];

                            $sql_cek_user = mysqli_query($db, "SELECT * FROM tb_siswa WHERE username = '$user'") or die ($db->error);
                            if(mysqli_num_rows($sql_cek_user) > 0) {
                                echo "<script>alert('Username yang Anda pilih sudah ada, silahkan ganti yang lain');</script>";
                            } else {
                                if($nama_gambar != '') {
                                    if(move_uploaded_file($sumber, $target.$nama_gambar)) {
                                        mysqli_query($db, "INSERT INTO tb_siswa VALUES('', '$nis', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$alamat', '$kelas', '$thn_masuk', '$nama_gambar', '$user', md5('$pass'), '$pass', 'tidak aktif')") or die ($db->error);
                                        echo '<script>alert("Pendaftaran berhasil, tunggu akun aktif 15 Menit - 3 Jam dan silahkan login"); window.location="./"</script>';
                                    } else {
                                        echo '<script>alert("Gagal mendaftar, foto gagal diupload, coba lagi!");</script>';
                                    }
                                } else {
                                    mysqli_query($db, "INSERT INTO tb_siswa VALUES('', '$nis', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$alamat', '$kelas', '$thn_masuk', 'anonim.png', '$user', md5('$pass'), '$pass', 'tidak aktif')") or die ($db->error);
                                    echo '<script>alert("Pendaftaran berhasil, tunggu akun aktif 15 Menit - 3 Jam dan silahkan login"); window.location="./"</script>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php
            } else if(@$_GET['page'] == 'pengumuman') {
                include "inc/pengumuman.php";
            } ?>
        </div>
    </div>
    <div class="simple-footer">
      Copyright &copy; 2020 E-Learning SMAN 10 BOGOR
    </div>
  </div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>

<div id="login-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Pentunjuk Registrasi E-Learning</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <ul>
    <li>Silahkan Isi data data yang dibawah ini dengan benar</li>
    <li>Tanda * artinya wajib untuk di isi</li>
    <li>Setelah mendaftar, mohon tunggu 15 Menit - 3 Jam karena data registrasi akan segera di konfirmasi oleh admin.</li>
  </ul>
  </div>
  <div class="modal-footer">
    <a href="./" <button type="button" class="btn btn-success">Login</button> </a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pwstrength-bootstrap/3.0.9/pwstrength-bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/selectric@1.13.0/src/jquery.selectric.min.js"></script>

    <!-- Template JS File -->
    <script src="stisla/assets/js/scripts.js"></script>
    <script src="stisla/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="stisla/assets/js/page/auth-register.js"></script>
    <script>
    $('#login-modal').modal('show');
    </script>

</body>
</html>
