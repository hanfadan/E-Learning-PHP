<?php
@session_start();
include "+koneksi.php";

if (!@$_SESSION['siswa']) {
    if (@$_GET['hal'] == 'daftar') {
        include "register.php";
    } else {
        include "login.php";
    }
} else { ?>
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
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

    <!-- Page Specific CSS File -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="stisla/assets/css/style.css">
    <link rel="stylesheet" href="stisla/assets/css/components.css">

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <!-- Data Table JS -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

  <!-- JS Libraies -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

  <!-- Template JS File -->
  <script src="stisla/assets/js/stisla.js"></script>
  <script src="stisla/assets/js/scripts.js"></script>
  <script src="stisla/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script>
$(document).ready( function () {
  // Setup - add a text input to each footer cell
  $('#example thead tr').clone(true).appendTo( '#example thead' );
  $('#example thead tr:eq(1) th').each( function (i) {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

      $( 'input', this ).on( 'keyup change', function () {
          if ( table.column(i).search() !== this.value ) {
              table
                  .column(i)
                  .search( this.value )
                  .draw();
          }
      } );
  } );

  var table = $('#example').DataTable( {
    dom: 'Bftrip',
      orderCellsTop: true,
      fixedHeader: true
  } );} );
</script>

<?php
$sql_terlogin = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_siswa = '$_SESSION[siswa]' AND tb_kelas.id_kelas = tb_siswa.id_kelas") or die($db->error);
$data_terlogin = mysqli_fetch_array($sql_terlogin);
?>
  </head>
  <body>
<div id="modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Petunjuk Penggunaan E-Learning Bagi Siswa</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <ul>
    <li>Usahakan presensi setelah melakukan kegiatan pembelajaran</li>
    <li>Untuk mengunduh materi yang sudah di upload oleh Guru silhakan klik menu materi</li>
    <li>Klik CBT untuk melihat Ujian yang masih tersedia</li>
    <li>Klik Nilai untuk melihat hasil Ujian dan tugas anda</li>
    <li>Untuk melihat pengumuman seputar KBM silahkan klik menu pengumuman</li>
    <li>Anda dapat menggunakan menu di navbar sebelah kiri untuk berpindah halaman</li>
  </ul>
  </div>
  <div class="modal-footer">
    <a href="?page=presensi"><button type="button" class="btn btn-primary" >Presensi</button></a>
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
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message"><i class="fas fa-info-circle"></i></a>
          <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Informasi User</div>
            <div class="dropdown-list-content dropdown-list-message">
              <a class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item">
                    Nama  : <?php echo $data_terlogin['nama_lengkap']; ?>
                </div>
              </a>
              <a class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item">
                    Kelas : <?php echo $data_terlogin['nama_kelas']; ?>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="img/foto_siswa/<?php echo $data_terlogin['foto']; ?>" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">Selamat datang, <?php echo ucfirst($data_terlogin['username']); ?>.</div></a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="?hal=detailprofil" class="dropdown-item has-icon">
              <i class="far fa-user"></i> Profile
            </a>
            <a href="?hal=editprofil" class="dropdown-item has-icon">
              <i class="fas fa-cog"></i> Edit Profile
            </a>
            <a href="inc/logout.php?sesi=siswa" class="dropdown-item has-icon text-danger">
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
            <li><a class="nav-link" href="./"><i class="fas fa-home"></i> <span>Home</span></a></li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-school"></i><span>Belajar</span></a>
              <ul class="dropdown-menu">
            <li><a class="nav-link" href="?page=presensi"><i class="fas fa-calendar-check"></i> <span>Presensi</span></a></li>
            <li><a class="nav-link" href="?page=materi"><i class="fas fa-book-reader"></i> <span>Materi</span></a></li>
            <li><a class="nav-link" href="?page=tugas"><i class="far fa-file-word"></i> <span>Tugas</span></a></li>
            <li><a class="nav-link" href="?page=quiz"><i class="far fa-file-alt"></i> <span>CBT</span></a></li>
            <li><a class="nav-link" href="?page=pengumuman"><i class="far fa-newspaper"></i> <span>Pengumuman</span></a></li>
          </ul>
        </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-sticky-note"></i><span>Nilai</span></a>
              <ul class="dropdown-menu">
            <li><a class="nav-link" href="?page=nilai"><i class="far fa-address-card"></i> <span>Nilai CBT</span></a></li>
            <li><a class="nav-link" href="?page=nilaitugas"><i class="fas fa-address-card"></i> <span>Nilai Tugas</span></a></li>
          </ul>
        </li>
            <li><a class="nav-link" href="?page=meet"><i class="fas fa-podcast"></i> <span>Video Conference</span></a></li>
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
              include "inc/beranda.php";
          } elseif (@$_GET['page'] == 'quiz') {
              include "inc/quiz.php";
          } elseif (@$_GET['page'] == 'tugas') {
              include "inc/tugas.php";
          } elseif (@$_GET['page'] == 'nilai') {
              include "inc/nilai.php";
          } elseif (@$_GET['page'] == 'nilaitugas') {
              include "inc/nilai_tugas.php";
          } elseif (@$_GET['page'] == 'materi') {
              include "inc/materi.php";
          } elseif (@$_GET['page'] == 'pengumuman') {
              include "inc/pengumuman.php";
          } elseif (@$_GET['page'] == 'presensi') {
              include "inc/presensi.php";
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

</body>
</html>
<?php
}
?>
