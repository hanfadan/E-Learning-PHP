<?php
@session_start();
include "+koneksi.php";

$id_tu = @$_GET['id_tu'];
$no = 1;
$no2 = 1;
$sql_tq = mysqli_query($db, "SELECT * FROM tb_topik_tugas JOIN tb_mapel ON tb_topik_tugas.id_mapel = tb_mapel.id WHERE id_tu = '$id_tu'") or die($db->error);
$data_tq = mysqli_fetch_array($sql_tq);
?>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script type="text/javascript" src="assets/js/summernote-file.js"></script>
<script type="text/javascript" src="assets/js/summernote-audio.js"></script>
<?php
if (@$_SESSION['siswa']) { ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Tugas E-Learning SMAN 10 BOGOR</title>
    <link rel="icon" type="image/ico" href="img/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="stisla/assets/css/style.css">
    <link rel="stylesheet" href="stisla/assets/css/components.css">
    <link rel="stylesheet" href="assets/css/summernote-audio.css">
    <!-- Template JS File -->
    <script src="stisla/assets/js/stisla.js"></script>
    <script src="stisla/assets/js/scripts.js"></script>
    <script src="stisla/assets/js/custom.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <style type="text/css">
    .mrg-del {
        margin: 0;
        padding: 0;
    }
    </style>
</head>
<body>

  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
      </nav>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a>E-Learning SMAN 10 Bogor</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a>DIXER TEN</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href=""><i class="fas fa-sync"></i> <span>Refresh</span></a></li>
              <li><a class="nav-link" href="./"><i class="fas fa-arrow-left"></i> <span>Kembali</span></a></li>
              <li><a class="nav-link" ><span>Tanggal Pembuatan :</span></a></li>
              <li><a class="nav-link" ><span><?php echo $tgl_buat = $data_tq['tgl_buat'];?></span></a></li>
              <li><a class="nav-link" ><span>Batas Pengumpulan :</span></a></li>
              <li><a class="nav-link" ><span><?php echo $tgl_pengumpulan = $data_tq['tgl_pengumpulan'];?></span></a></li>
            </ul>
        </aside>
      </div>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
             <h1><?php echo $data_tq['judul']; ?> - <?php echo $data_tq['mapel']; ?></h1>
          <div class="section-header-breadcrumb">
          </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
		    	<form method="post" enctype="multipart/form-data">
					<?php
                    $sql_soal_upload = mysqli_query($db, "SELECT * FROM tb_soal_upload WHERE id_tu = '$id_tu'") or die($db->error);
                    if (mysqli_num_rows($sql_soal_upload) > 0) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><b>Soal</b></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php
                                    while ($data_soal_upload = mysqli_fetch_array($sql_soal_upload)) { ?>
                                        <table class="table">
                                            <tr>
                                                <td width="10%">( <?php echo $no2++; ?> )</td>
                                                <td><b><?php echo $data_soal_upload['pertanyaan']; ?></b></td>
                                            </tr>
                                            <?php if ($data_soal_upload['gambar'] != '') { ?>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <img width="220px" src="admin/img/gambar_soal_upload/<?php echo $data_soal_upload['gambar']; ?>" />
                                                        <?php echo $data_soal_upload['id_tu']; ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>Jawab</td>
                                                <td>
                                                    <input type="file" name="jawaban" class="form-control" rows="3" required>
                                                </td>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                        </div>
                    <input type="hidden" name="id_tu" value="<?php echo $id_tu; ?>" />
                    <input type="hidden" name="id_soal" value="<?php echo $data_soal_upload['id_tu']; ?>" />
                    <input type="hidden" name="id_siswa" value="<?php echo $_SESSION['siswa']; ?>" />
                    <input type="hidden" name="tgl_mengumpulkan" value="<?php setlocale(LC_ALL, 'id-ID', 'id_ID'); echo "".date('d/m/Y'); ?>" />
                    <input type="hidden" name="waktu_mengumpulkan" value="<?php setlocale(LC_ALL, 'id-ID', 'id_ID'); echo "".date("h:i:s"); ?>" />

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div>
                              <input type='submit' <?php if(strtotime($tgl_buat) < strtotime($tgl_pengumpulan)) {?> disabled="disabled" <?php } ?> id="simpan" name="simpan" value="Simpan" class="btn btn-success" >
                                <input type="reset" value="Reset Jawaban" class="btn btn-danger" />
                            </div>
                        </div>
                        <?php
                        } ?>
                    </div>
                    <?php
                    } ?>
		        </form>
            <?php
            if (@$_POST['simpan']) {
                $id_tu = @mysqli_real_escape_string($db, $_POST['id_tu']);
                $id_soal = @mysqli_real_escape_string($db, $_POST['id_soal']);
                $id_siswa = @mysqli_real_escape_string($db, $_POST['id_siswa']);
                $tgl_mengumpulkan = @mysqli_real_escape_string($db, $_POST['tgl_mengumpulkan']);
                $waktu_mengumpulkan = @mysqli_real_escape_string($db, $_POST['waktu_mengumpulkan']);

                $sumber = @$_FILES['jawaban']['tmp_name'];
                $target = 'admin/jawaban_tugas/';
                $nama_file = @$_FILES['jawaban']['name'];

                if (move_uploaded_file($sumber, $target.$nama_file)) {
                    if (@$_SESSION[siswa]) {
                        mysqli_query($db, "INSERT INTO tb_jawaban_upload VALUES('', '$id_tu', '$id_soal', '$id_siswa', '$nama_file' , '$tgl_mengumpulkan' , '$waktu_mengumpulkan')") or die($db->error);
                    }
                    echo '<script>window.location="./";</script>';
                } else {
                    echo '<script>alert("Gagal menambah Tugas, file gagal diupload, coba lagi!");</script>';
                }
            } ?>
          </div>
          </div>
        </div>
      </div>
        </section>
      </div>
    </div>
  </div>

<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2020 <div class="bullet"></div> E-Learning SMAN 10 BOGOR
  </div>
  <div class="footer-right">
    Made with 💙 By : ICT SMAN 10
  </div>
</footer>

</body>
</html>

<?php
} else {
                echo "<script>window.location='./';</script>";
            } ?>
