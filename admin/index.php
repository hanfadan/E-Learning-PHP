<?php
@session_start();
include "../+koneksi.php";

if (@$_SESSION['admin'] || @$_SESSION['pengajar']) {
    ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/ico" href="img/favicon.ico"/>
  <title>E-Learning SMAN 10 BOGOR</title>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

    <!-- Data Table CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.1/css/fixedColumns.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.3/css/keyTable.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.3/css/scroller.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.0.0/css/searchBuilder.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.2.1/css/searchPanes.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap4.min.css"/>

    <!-- Template CSS -->
    <link rel="stylesheet" href="stisla/assets/css/style.css">
    <link rel="stylesheet" href="stisla/assets/css/components.css">

    <!-- General JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


    <!-- Data Table JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.3/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.3/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.0.0/js/dataTables.searchBuilder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.0.0/js/searchBuilder.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.1/js/searchPanes.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <!-- JS Libraies -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <!-- Template JS File -->
    <script src="stisla/assets/js/stisla.js"></script>
    <script src="stisla/assets/js/scripts.js"></script>
    <script src="stisla/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->

</head>

<body>

  <div id="modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Petunjuk Penggunaan E-Learning Bagi Pengajar</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <ul>
      <li>Harap isi jurnal harian setelah melakukan pembelajaran </li>
      <li>Untuk Menambahkan Materi pembelajaran gunakan menu materi</li>
      <li>Untuk Menambahkan Tugas gunakan menu Tugas</li>
      <li>Untuk Membuat Ujian gunakan menu CBT</li>
      <li>Untuk Melihat Rekap Nilai Ujian dan Tugas gunakan menu Rekap</li>
      <li>Jika ingin membuat pempengumumanhuan seperti jadwal vcon, tugas atau ujian buatlah Pengumuman</li>
      <li>Bagi Pengguna baru harap membaca informasi seputar e-learning terlebih dahulu</li>
      <li>Anda dapat menggunakan menu di navbar sebelah kiri untuk berpindah halaman</li>
    </ul>
    </div>
    <div class="modal-footer">
      <a href="?page=jurnal"><button type="button" class="btn btn-primary" > Jurnal Harian</button></a>
             </div>
         </div>

     </div>
  </div>

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
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Selamat datang,

              <?php
              if (@$_SESSION['admin']) {
                  $sesi_id = @$_SESSION['admin'];
                  $level = "admin";
              } elseif (@$_SESSION['pengajar']) {
                  $sesi_id = @$_SESSION['pengajar'];
                  $level = "pengajar";
              }

    if ($level == 'admin') {
        $sql_terlogin = mysqli_query($db, "SELECT * FROM tb_admin WHERE id_admin = '$sesi_id'") or die($db->error);
    } elseif ($level == 'pengajar') {
        $sql_terlogin = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$sesi_id'") or die($db->error);
    }
    $data_terlogin = mysqli_fetch_array($sql_terlogin);
    echo ucfirst($data_terlogin['username']); ?>
              </div></a>

            <div class="dropdown-menu dropdown-menu-right">
              <a href="?hal=detailprofil" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="?hal=editprofil" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Edit Profile
              </a>
              <a href="<?php cek_session('../inc/logout.php?sesi=admin', '../inc/logout.php?sesi=pengajar'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="./">E-Learning SMAN 10 Bogor</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="./">DIXER TEN</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <?php
              if (@$_SESSION['admin']) {
                  ?>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-school"></i><span>Pembelajaran</span></a>
                    <ul class="dropdown-menu">
                      <li><a class="nav-link" href="?page=kelas"><i class="fa fa-table"></i><span>Kelas</span></a></li>
                      <li><a class="nav-link" href="?page=mapel"><i class="fa fa-fw fa-file"></i><span>Mata Pelajaran</span></a></li>
                  <li><a class="nav-link" href="?page=materi"><i class="fas fa-book-reader"></i><span>Materi</span></a></li>
                  <li><a class="nav-link" href="?page=tugas"><i class="far fa-file-word"></i><span>Tugas</span></a></li>
                  <li><a class="nav-link" href="?page=quiz"><i class="far fa-sticky-note"></i><span>CBT</span></a></li>
                  <li><a class="nav-link" href="?page=pengumuman"><i class="far fa-newspaper"></i><span>Pengumuman</span></a></li>
                </ul>
              </li>
                      <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-list"></i><span>Rekap</span></a>
                        <ul class="dropdown-menu">
                      <li><a class="nav-link" href="?page=rekapjurnalpengajar"><i class="fas fa-clipboard-check"></i><span>Jurnal Harian</span></a></li>
                      <li><a class="nav-link" href="?page=rekappresensisiswa"><i class="fas fa-clipboard-check"></i><span>Presensi Siswa</span></a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i><span>Manajemen Data</span></a>
                    <ul class="dropdown-menu">
                      <li><a href="?page=pengajar" class="nav-link"><i class="fas fa-chalkboard-teacher"></i><span>Pengajar</span></a></li>
                      <li><a href="?page=siswa" class="nav-link"><i class="fas fa-users"></i> <span>Siswa</span></a></li>
                      <li><a href="?page=siswaregistrasi" class="nav-link"><i class="fas fa-registered"></i><span>Registrasi Siswa</span></a></li>
                    </ul>
                  </li>
                      <li><a class="nav-link" href="?page=meet"><i class="fas fa-podcast"></i><span>Video Conference</span></a></li>
          <?php
              } ?>
          <?php
          if (@$_SESSION['pengajar']) {
              ?>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-school"></i><span>Pembelajaran</span></a>
                <ul class="dropdown-menu">
              <li><a class="nav-link" href="?page=jurnal"><i class="fas fa-calendar-check"></i><span>Jurnal Harian</span></a></li>
              <li><a class="nav-link" href="?page=materi"><i class="fas fa-book-reader"></i><span>Materi</span></a></li>
              <li><a class="nav-link" href="?page=tugas"><i class="far fa-file-word"></i><span>Tugas</span></a></li>
              <li><a class="nav-link" href="?page=quiz"><i class="far fa-sticky-note"></i><span>CBT</span></a></li>
              <li><a class="nav-link" href="?page=kelas"><i class="fa fa-table"></i><span>Kelas</span></a></li>
              <li><a class="nav-link" href="?page=mapel"><i class="fa fa-fw fa-file"></i><span>Mapel</span></a></li>
              <li><a class="nav-link" href="?page=pengumuman"><i class="far fa-newspaper"></i><span>Pengumuman</span></a></li>
            </ul>
          </li>
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-list"></i><span>Rekap</span></a>
                    <ul class="dropdown-menu">
                  <li><a class="nav-link" href="?page=rekappresensisiswa"><i class="fas fa-clipboard-check"></i><span>Presensi Siswa</span></a></li>
                  <li><a class="nav-link" href="?page=rekapnilaisiswa"><i class="fas fa-clipboard-list"></i><span>Nilai CBT</span></a></li>
                  <li><a class="nav-link" href="?page=rekapnilaitugas"><i class="fas fa-paste"></i><span>Nilai Tugas</span></a></li>
                </ul>
              </li>
                  <li><a class="nav-link" href="?page=meet"><i class="fas fa-podcast"></i><span>Video Conference</span></a></li>
          <?php
          } ?>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>E-Learning SMAN 10 Bogor</h1>
          </div>

          <div class="section-body">
            <div class="card-wrap">
            <div class="row">
              <div class="col-12">
                <div class="card">
            <div class="card-body">

                <?php
                if (@$_GET['page'] == '') {
                    include "inc/dashboard.php";
                } elseif (@$_GET['page'] == 'pengajar') {
                    include "inc/pengajar.php";
                } elseif (@$_GET['page'] == 'siswaregistrasi') {
                    include "inc/siswaregistrasi.php";
                } elseif (@$_GET['page'] == 'siswa') {
                    include "inc/siswa.php";
                } elseif (@$_GET['page'] == 'kelas') {
                    include "inc/kelas.php";
                } elseif (@$_GET['page'] == 'mapel') {
                    include "inc/mapel.php";
                } elseif (@$_GET['page'] == 'quiz') {
                    include "inc/quiz.php";
                } elseif (@$_GET['page'] == 'tugas') {
                    include "inc/tugas.php";
                } elseif (@$_GET['page'] == 'materi') {
                    include "inc/materi.php";
                } elseif (@$_GET['page'] == 'pengumuman') {
                    include "inc/pengumuman.php";
                } elseif (@$_GET['page'] == 'jurnal') {
                    include "inc/jurnal.php";
                } elseif (@$_GET['page'] == 'rekappresensisiswa') {
                    include "inc/rekappresensisiswa.php";
                } elseif (@$_GET['page'] == 'rekapjurnalpengajar') {
                    include "inc/rekapjurnalpengajar.php";
                } elseif (@$_GET['page'] == 'rekapnilaisiswa') {
                    include "inc/rekapnilaisiswa.php";
                } elseif (@$_GET['page'] == 'rekapnilaitugas') {
                    include "inc/rekapnilaitugas.php";
                } elseif (@$_GET['page'] == 'importdatapengajar') {
                    include "inc/form_import_data_pengajar.php";
                } elseif (@$_GET['page'] == 'importtugas') {
                    include "inc/form_import_tugas.php";
                } elseif (@$_GET['page'] == 'meet') {
                    include "inc/meet.php";
                } elseif (@$_GET['page'] == 'room1') {
                    include "vcon/iframe/iframe-room1.php";
                } elseif (@$_GET['page'] == 'room2') {
                    include "vcon/iframe/iframe-room2.php";
                } elseif (@$_GET['page'] == 'room3') {
                    include "vcon/iframe/iframe-room3.php";
                } elseif (@$_GET['page'] == 'room4') {
                    include "vcon/iframe/iframe-room4.php";
                } elseif (@$_GET['page'] == 'room-rapat-guru') {
                    include "vcon/room-rapat-guru.php";
                } else {
                    echo "<div class='col-xs-12'><div class='alert alert-danger'>[404] Halaman tidak ditemukan! Silahkan pilih menu yang ada!</div></div>";
                } ?>
              </div>
              </div>
            </div>
          </div>
              </div>
            </section>
          </div>

          <footer class="main-footer">
            <div class="footer-left">
              Copyright &copy; 2020 <div class="bullet"></div> E-Learning SMAN 10 BOGOR
            </div>
            <div class="footer-right">
              Made with 💙 By : ICT SMAN 10
            </div>
          </footer>
            </div>
        </div>
    </div>
</body>

</html>
<?php
} else {
                    include "login.php";
                }
?>
