<?php
$sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_siswa = '$_SESSION[siswa]'") or die($db->error);
$data = mysqli_fetch_array($sql_siswa);
// menghitung jumlah pengumuman
$data_pengumuman = mysqli_query($db, "SELECT * FROM tb_pengumuman") or die($db->error);
$jumlah_pengumuman = mysqli_num_rows($data_pengumuman);
// menghitung jumlah materi
$data_materi = mysqli_query($db, "SELECT * FROM tb_file_materi") or die($db->error);
$jumlah_materi = mysqli_num_rows($data_materi);
// menghitung jumlah mapel
$data_mapel = mysqli_query($db, "SELECT * FROM tb_mapel");
$jumlah_mapel = mysqli_num_rows($data_mapel);
// menghitung jumlah quiz/Tugas
$data_quiz = mysqli_query($db, "SELECT * FROM tb_topik_cbt") or die($db->error);
$jumlah_quiz = mysqli_num_rows($data_quiz);
// menghitung jumlah nilai
$data_nilai = mysqli_query($db, "SELECT * FROM tb_nilai_pilgan") or die($db->error);
$jumlah_nilai = mysqli_num_rows($data_nilai);
// menghitung jumlah tugas
$data_tugas = mysqli_query($db, "SELECT * FROM tb_topik_tugas WHERE id_kelas") or die($db->error);
$jumlah_tugas = mysqli_num_rows($data_tugas);

if (@$_GET['hal'] == '') { ?>

  <script>
  $('#modal').modal('show');
  </script>

    <div class="row">
        <div class="col-12 mb-4">
          <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="stisla/assets/img/unsplash/ivan-aleksic-PDRFeeDniCk-unsplash.jpg">
            <div class="hero-inner">
              <h2>Selamat Datang, <?php echo $data['nama_lengkap']; ?>!</h2>
              <p class="lead">Silahkan pilih menu sesuai kebutuhan Anda, jika ada yang kurang jelas silahkan bertanya kepada administrator atau guru yang bersangkutan.</p>
              <div class="mt-4">
                <a href="?hal=editprofil" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Atur akun anda</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <a href="?page=pengumuman">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Pengumuman</h4>
              </div>
              <div class="card-body">
                <?php echo $jumlah_pengumuman; ?>
              </div>
            </div>
          </div>
        </div>
        </a>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <a href="?page=materi">
            <div class="card-icon bg-warning">
              <i class="fas fa-book-reader"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Materi</h4>
              </div>
              <div class="card-body">
                <?php echo $jumlah_materi; ?>
              </div>
            </div>
          </div>
        </div>
        </a>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <a href="?page=quiz">
            <div class="card-icon bg-primary">
            <i class="far fa-file-alt fa-5x"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>CBT</h4>
                </div>
            <div class="card-body">
              <?php echo $jumlah_quiz; ?>
              </div>
            </div>
          </div>
        </div>
        </a>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <a href="?page=quiz">
            <div class="card-icon bg-success">
            <i class="far fa-file-word"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Tugas</h4>
                </div>
            <div class="card-body">
              <?php echo $jumlah_tugas; ?>
              </div>
            </div>
          </div>
        </div>
        </a>
    </div>
    <div class="card-header">
  <h4>Informasi Seputar E-Learning</h4>
</div>
    <div class="row mt-4">
  <div class="col-12 col-lg-8 offset-lg-2">
    <div class="wizard-steps">
      <div class="wizard-step wizard-step-active">
        <div class="wizard-step-icon">
          <i class="fas fa-user-check"></i>
        </div>
        <div class="wizard-step-label">
          Presensi saat matapelajaran
        </div>
      </div>
      <div class="wizard-step wizard-step-warning">
        <div class="wizard-step-icon">
          <i class="fas fa-bullhorn"></i>
        </div>
        <div class="wizard-step-label">
          Pantau Pengumuman untuk informasi pembelajaran
        </div>
      </div>
      <div class="wizard-step wizard-step-primary">
        <div class="wizard-step-icon">
          <i class="fas fa-tasks"></i>
        </div>
        <div class="wizard-step-label">
          Kerjakan Tugas dan CBT
        </div>
      </div>
      <div class="wizard-step wizard-step-info">
        <div class="wizard-step-icon">
          <i class="far fa-question-circle"></i>
        </div>
        <div class="wizard-step-label">
          Kontak Admin bila ada masalah
        </div>
      </div>
    </div>
  </div>
</div>
<?php
} elseif (@$_GET['hal'] == 'detailprofil') { ?>
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-head-line">Detail Profil</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td><?php echo $data['nis']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Tanggal Lahir</td>
                        <td>:</td>
                        <td><?php echo $data['tempat_lahir'].", ".tgl_indo($data['tgl_lahir']); ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><?php echo $data['agama']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?php echo $data['nama_kelas']; ?></td>
                    </tr>
                    <tr>
                        <td>Tahun Masuk</td>
                        <td>:</td>
                        <td><?php echo $data['thn_masuk']; ?></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td><img src="./img/foto_siswa/<?php echo $data['foto']; ?>" width="200px" /></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?php echo $data['username']; ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><?php echo $data['pass']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
} elseif (@$_GET['hal'] == 'editprofil') { ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Edit Profil</h4>
        </div>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-6">
                NIS* :<input type="text" name="nis" value="<?php echo $data['nis']; ?>" class="form-control" required />
                </div>
                <div class="form-group col-md-6">
                Nama Lengkap* : <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" required />
                </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                Tempat Lahir* : <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" required />
                </div>
                <div class="form-group col-md-6">
                Tanggal Lahir* : <input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" class="form-control" required />
                </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                Jenis Kelamin* :
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="L">Laki-laki</option>
                    <option value="P" <?php if ($data['jenis_kelamin'] == 'P') {
    echo "selected";
} ?>>Perempuan</option>
                </select>
                </div>
                <div class="form-group col-md-4">
                Agama* :
                <select name="agama" class="form-control" required>
                    <option value="Islam">Islam</option>
                    <option value="Kristen" <?php if ($data['agama'] == 'Kristen') {
    echo "selected";
} ?>>Kristen</option>
                    <option value="Katholik" <?php if ($data['agama'] == 'Katholik') {
    echo "selected";
} ?>>Katholik</option>
                    <option value="Hindu" <?php if ($data['agama'] == 'Hindu') {
    echo "selected";
} ?>>Hindu</option>
                    <option value="Budha" <?php if ($data['agama'] == 'Budha') {
    echo "selected";
} ?>>Budha</option>
                    <option value="Konghucu" <?php if ($data['agama'] == 'Konghucu') {
    echo "selected";
} ?>>Konghucu</option>
                </select>
                </div>
                <div class="form-group col-md-4">
                Kelas* :
                <select name="kelas" class="form-control" required>
                    <option value="<?php echo $data['id_kelas']; ?>"><?php echo $data['nama_kelas']; ?></option>
                    <option value="">- Pilih -</option>
                    <?php
                    $sql_kelas = mysqli_query($db, "SELECT * from tb_kelas") or die($db->error);
                    while ($data_kelas = mysqli_fetch_array($sql_kelas)) {
                        echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                    } ?>
                </select>
                </div>
                </div>
                Tahun Masuk* :
                <select name="thn_masuk" class="form-control" required>
                    <option value="<?php echo $data['thn_masuk']; ?>"><?php echo $data['thn_masuk']; ?></option>
                    <option value="">- Pilih -</option>
                    <?php
                    for ($i = 2020; $i >= 2000; $i--) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    } ?>
                </select>
                Foto : <br /><img src="./img/foto_siswa/<?php echo $data['foto']; ?>" width="150px" style="margin-bottom:5px;" /><input type="file" name="gambar" class="form-control" />
                <div class="form-row">
                  <div class="form-group col-md-6">
                Username* : <input type="text" name="user" value="<?php echo $data['username']; ?>" class="form-control" required />
              </div>
              <div class="form-group col-md-6">
                Password* : <input type="text" name="pass" value="<?php echo $data['pass']; ?>" class="form-control" required />
              </div>
            </div>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-info" />
                <input type="reset" class="btn btn-danger" />
            </form>
            <?php
            if (@$_POST['simpan']) {
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

                if ($nama_gambar == '') {
                    mysqli_query($db, "UPDATE tb_siswa SET nis = '$nis', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', alamat = '$alamat', id_kelas = '$kelas', thn_masuk = '$thn_masuk', username = '$user', password = md5('$pass'), pass = '$pass' WHERE id_siswa = '$_SESSION[siswa]'") or die($db->error);
                    echo '<script>window.location="?hal=detailprofil";</script>';
                } else {
                    if (move_uploaded_file($sumber, $target.$nama_gambar)) {
                        mysqli_query($db, "UPDATE tb_siswa SET nis = '$nis', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', alamat = '$alamat', id_kelas = '$kelas', thn_masuk = '$thn_masuk', foto = '$nama_gambar', username = '$user', password = md5('$pass'), pass = '$pass' WHERE id_siswa = '$_SESSION[siswa]'") or die($db->error);
                        echo '<script>window.location="?hal=detailprofil";</script>';
                    } else {
                        echo '<script>alert("Gagal mengedit info profil, foto gagal diupload, coba lagi!");</script>';
                    }
                }
            }
            ?>
        </div>
    </div>
<?php
} ?>
