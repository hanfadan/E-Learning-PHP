<?php
if (@$_SESSION['admin']) {
    if (@$_GET['hal'] == '') { ?>
    <div class="row">
      <div class="col-12 mb-4">
        <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="stisla/assets/img/unsplash/andrew-neel-cckf4TsHAuw-unsplash.jpg">
          <div class="hero-inner">
            <h2>Selamat Datang, <?php echo $data_terlogin['nama_lengkap']?>!</h2>
            <p class="lead">Silahkan pilih menu sesuai kebutuhan Anda, anda dapat mengatur semua data data elearnig seperti siswa, mapel, kelas , tugas dan rekap .</p>
            <div class="mt-4">
              <a href="?hal=editprofil" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Atur akun anda</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <a href="?page=pengajar">
          <div class="card-icon bg-primary">
                    <i class="fas fa-chalkboard-teacher fa-5x"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Pengajar</h4>
                          </div>
                    <div class="card-body">
                        <?php
                        $sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar") or die($db->error);
                        echo mysqli_num_rows($sql_pengajar);
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <a href="?page=siswaregistrasi">
                    <div class="card-icon bg-secondary">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Regis Siswa</h4>
                      </div>
                      <div class="card-body">
                        <?php
                        $sql_siswa_nonaktif = mysqli_query($db, "SELECT * FROM tb_siswa WHERE status = 'tidak aktif' ") or die($db->error);
                        echo mysqli_num_rows($sql_siswa_nonaktif);
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <a href="?page=siswa">
                    <div class="card-icon bg-info">
                    <i class="fas fa-users fa-4x"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Siswa</h4>
                        </div>
                    <div class="card-body">
                        <?php
                        $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa") or die($db->error);
                        echo mysqli_num_rows($sql_siswa);
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <a href="?page=mapel">
                    <div class="card-icon bg-success">
                      <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Mapel</h4>
                      </div>
                      <div class="card-body">
                        <?php
                        $sql_mapel = mysqli_query($db, "SELECT * FROM tb_mapel") or die($db->error);
                        echo mysqli_num_rows($sql_mapel);
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <a href="?page=kelas">
                    <div class="card-icon bg-dark">
                      <i class="fas fa-school"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Kelas</h4>
                      </div>
                      <div class="card-body">
                        <?php
                        $sql_kelas = mysqli_query($db, "SELECT * FROM tb_kelas") or die($db->error);
                        echo mysqli_num_rows($sql_kelas);
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
        </div>
    </div>

    <?php
    }
    if (@$_GET['hal'] == 'detailprofil') {
        $sql_admin = mysqli_query($db, "SELECT * FROM tb_admin WHERE id_admin = '$_SESSION[admin]'") or die($db->error);
        $data = mysqli_fetch_array($sql_admin); ?>
            <div class="row">
                <div class="col-md-12">
                        <div class="page-head-line">Detail Profil Anda &nbsp; <a href="?hal=editprofil" class="btn btn-warning btn-sm">Edit Profil</a></div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table width="100%" class="table">
                                    <tr>
                                        <td align="right"><b>Nama Lengkap</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['nama_lengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Alamat</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Username</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Password</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['pass']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php
    } elseif (@$_GET['hal'] == 'editprofil') {
        $sql_admin = mysqli_query($db, "SELECT * FROM tb_admin WHERE id_admin = '$_SESSION[admin]'") or die($db->error);
        $data = mysqli_fetch_array($sql_admin); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profil &nbsp; <a href="./" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a></div>
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Alamat *</label>
                                <textarea name="alamat" class="form-control" rows="3" required><?php echo $data['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="text" name="password" value="<?php echo $data['pass']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                                <input type="reset" class="btn btn-danger" value="Reset" />
                            </div>
                        </form>
                        <?php
                        if (@$_POST['simpan']) {
                            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
                            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
                            $username = @mysqli_real_escape_string($db, $_POST['username']);
                            $password = @mysqli_real_escape_string($db, $_POST['password']);

                            mysqli_query($db, "UPDATE tb_admin SET nama_lengkap = '$nama_lengkap', alamat = '$alamat', username = '$username', password = md5('$password'), pass = '$password' WHERE id_admin = '$_SESSION[admin]'") or die($db->error);
                            echo '<script>window.location="./";</script>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} elseif (@$_SESSION['pengajar']) {
    $sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$_SESSION[pengajar]'") or die($db->error);
    $data = mysqli_fetch_array($sql_pengajar);

    if (@$_GET['hal'] == '') { ?>
      <script>
      $('#modal').modal('show');
      </script>
    <div class="row">
      <div class="col-12 mb-4">
        <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="stisla/assets/img/unsplash/you-x-ventures-bzqU01v-G54-unsplash.jpg">
          <div class="hero-inner">
            <h2>Selamat Datang, <?php echo $data_terlogin['nama_lengkap']?>!</h2>
            <p class="lead">Silahkan pilih menu sesuai kebutuhan Anda, jika ada yang kurang jelas silahkan bertanya kepada administrator.</p>
            <div class="mt-4">
              <a href="?hal=editprofil" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Atur akun anda</a>
            </div>
          </div>
        </div>
      </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <a href="?page=mapel">
                    <div class="card-icon bg-success">
                      <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Mapel Ajar</h4>
                      </div>
                      <div class="card-body">
                        <?php
                        $sql_mapel = mysqli_query($db, "SELECT * FROM tb_mapel_ajar WHERE id_pengajar = '$_SESSION[pengajar]'") or die($db->error);
                        echo mysqli_num_rows($sql_mapel);
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <a href="?page=kelas">
                    <div class="card-icon bg-dark">
                      <i class="fas fa-school"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Kelas Ajar</h4>
                      </div>
                      <div class="card-body">
                        <?php
                        $sql_kelas = mysqli_query($db, "SELECT * FROM tb_kelas_ajar WHERE id_pengajar = '$_SESSION[pengajar]'") or die($db->error);
                        echo mysqli_num_rows($sql_kelas);
                        ?>
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
          <div class="wizard-step wizard-step-danger">
            <div class="wizard-step-icon">
              <i class="fas fa-school"></i>
            </div>
            <div class="wizard-step-label">
              Buatlah kelas ajar
            </div>
          </div>
          <div class="wizard-step wizard-step-dark">
            <div class="wizard-step-icon">
              <i class="fas fa-book"></i>
            </div>
            <div class="wizard-step-label">
              Buatlah mapel ajar
            </div>
          </div>
          <div class="wizard-step wizard-step-success">
            <div class="wizard-step-icon">
              <i class="fas fa-book-reader"></i>
            </div>
            <div class="wizard-step-label">
              Upload materi mapel
            </div>
          </div>
          <div class="wizard-step wizard-step-info">
            <div class="wizard-step-icon">
              <i class="fas fa-marker"></i>
            </div>
            <div class="wizard-step-label">
              Buatlah CBT & Tugas
            </div>
          </div>
          <div class="wizard-step wizard-step-warning">
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
    }

    if (@$_GET['hal'] == 'detailprofil') { ?>
            <div class="row">
                <div class="col-md-12">
                        <h4 class="page-head-line">Detail Profil Anda &nbsp; <a href="?hal=editprofil" class="btn btn-warning btn-sm">Edit Profil</a></h4>
                </div>
              </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="table-responsive">
                                <table width="200%" class="table">
                                    <tr>
                                        <td align="right" width="46%"><b>NIP</b></td>
                                        <td align="center">:</td>
                                        <td width="46%"><?php echo $data['nip']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Nama Lengkap</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['nama_lengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Tempat Tanggal Lahir</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['tempat_lahir'].", ".tgl_indo($data['tgl_lahir']); ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Jenis Kelamin</b></td>
                                        <td align="center">:</td>
                                        <td><?php if ($data['jenis_kelamin'] == 'L') {
        echo "Laki-laki";
    } else {
        echo "Perempuan";
    } ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Alamat</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right" valign="top"><b>Foto</b></td>
                                        <td align="center" valign="top">:</td>
                                        <td>
                                            <div style="padding:10px 0;"><img width="250px" src="../admin/img/foto_pengajar/<?php echo $data['foto']; ?>" /></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Username</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Password</b></td>
                                        <td align="center">:</td>
                                        <td><?php echo $data['pass']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php
    } elseif (@$_GET['hal'] == 'editprofil') { ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profil &nbsp; <a href="./" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a></div>
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" name="nip" value="<?php echo $data['nip']; ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir *</label>
                                <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir *</label>
                                <input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin *</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P" <?php if ($data['jenis_kelamin'] == 'P') {
        echo "selected";
    } ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat *</label>
                                <textarea name="alamat" class="form-control" rows="3" required><?php echo $data['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div style="padding:0 0 5px 0;"><img width="200px" src="../admin/img/foto_pengajar/<?php echo $data['foto']; ?>" /></div>
                                <input type="file" name="gambar" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="text" name="password" value="<?php echo $data['pass']; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                                <input type="reset" class="btn btn-danger" value="Reset" />
                            </div>
                        </form>
                        <?php
                        if (@$_POST['simpan']) {
                            $nip = @mysqli_real_escape_string($db, $_POST['nip']);
                            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
                            $tempat_lahir = @mysqli_real_escape_string($db, $_POST['tempat_lahir']);
                            $tgl_lahir = @mysqli_real_escape_string($db, $_POST['tgl_lahir']);
                            $jenis_kelamin = @mysqli_real_escape_string($db, $_POST['jenis_kelamin']);
                            $alamat = @mysqli_real_escape_string($db, $_POST['alamat']);
                            $username = @mysqli_real_escape_string($db, $_POST['username']);
                            $password = @mysqli_real_escape_string($db, $_POST['password']);

                            $sumber = @$_FILES['gambar']['tmp_name'];
                            $target = 'img/foto_pengajar/';
                            $nama_gambar = @$_FILES['gambar']['name'];

                            if ($nama_gambar == '') {
                                mysqli_query($db, "UPDATE tb_pengajar SET nip = '$nip', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', username = '$username', password = md5('$password'), pass = '$password' WHERE id_pengajar = '$_SESSION[pengajar]'") or die($db->error);
                                echo '<script>window.location="./";</script>';
                            } else {
                                if (move_uploaded_file($sumber, $target.$nama_gambar)) {
                                    mysqli_query($db, "UPDATE tb_pengajar SET nip = '$nip', nama_lengkap = '$nama_lengkap', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', foto = '$nama_gambar', username = '$username', password = md5('$password'), pass = '$password' WHERE id_pengajar = '$_SESSION[pengajar]'") or die($db->error);
                                    echo '<script>window.location="./";</script>';
                                } else {
                                    echo '<script>alert("Gagal mengedit info profil, foto gagal diupload, coba lagi!");</script>';
                                }
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} ?>
