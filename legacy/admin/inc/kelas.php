<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Manajemen Kelas</h1>
    </div>
</div>

<script>
$(document).ready( function () {
  var table = $('#kelas').DataTable();

// #myInput is a <input type="text"> element
$('#myInput').on( 'keyup', function () {
    table.search( this.value ).draw();
} );
} );
  </script>

<?php
$id = @$_GET['id'];
$sql_per_id = mysqli_query($db, "SELECT * FROM tb_kelas WHERE id_kelas = '$id'") or die($db->error);
$data = mysqli_fetch_array($sql_per_id);

$sql_kelas = mysqli_query($db, "SELECT * FROM tb_kelas") or die($db->error);
$no = 1;

if (@$_SESSION[admin]) {
    echo '<div class="row">';
    if (@$_GET['action'] == '') { ?>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a href="?page=kelas&action=tambah" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah Data</a>
                 </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="kelas">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kelas</th>
                                    <th>Wali Kelas</th>
                                    <th>Ketua Kelas</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($data_kelas = mysqli_fetch_array($sql_kelas)) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data_kelas['nama_kelas']; ?></td>
                                    <?php
                                    $sql_tampil_guru = tampil_per_id("tb_pengajar", "id_pengajar = '$data_kelas[wali_kelas]'");
                                    $data_tampil_guru = mysqli_fetch_array($sql_tampil_guru);
                                    $cek_tampil_guru = mysqli_num_rows($sql_tampil_guru);
                                    if ($cek_tampil_guru > 0) {
                                        echo "<td>".$data_tampil_guru['nama_lengkap']."</td>";
                                    } else {
                                        echo "<td><i>Belum diatur</i></td>";
                                    }

                                    $sql_tampil_siswa = tampil_per_id("tb_siswa", "id_siswa = '$data_kelas[ketua_kelas]'");
                                    $data_tampil_siswa = mysqli_fetch_array($sql_tampil_siswa);
                                    $cek_tampil_siswa = mysqli_num_rows($sql_tampil_siswa);
                                    if ($cek_tampil_siswa > 0) {
                                        echo "<td>".$data_tampil_siswa['nama_lengkap']."</td>";
                                    } else {
                                        echo "<td><i>Belum diatur</i></td>";
                                    } ?>
                                    <td align="center" width="200px">
                                      <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                        <a href="?page=kelas&action=edit&id=<?php echo $data_kelas['id_kelas']; ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
                                        <a onclick="return confirm('Yakin akan menghapus data?');" href="?page=kelas&action=hapus&id=<?php echo $data_kelas['id_kelas']; ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                        <a href="?page=siswa&IDkelas=<?php echo $data_kelas['id_kelas']; ?>&kelas=<?php echo $data_kelas['nama_kelas']; ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-search-plus"></i>Lihat Siswa</a>
                                      </div>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } elseif (@$_GET['action'] == 'tambah') { ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data Kelas &nbsp; <a href="?page=kelas" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a></div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Nama Kelas *</label>
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Ex: X-A" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                            <input type="reset" value="Reset" class="btn btn-danger" />
                        </div>
                    </form>
                    <?php
                    if (@$_POST['simpan']) {
                        $nama_kelas = @mysqli_real_escape_string($db, $_POST['nama_kelas']);
                        mysqli_query($db, "INSERT INTO tb_kelas(nama_kelas) VALUES('$nama_kelas')") or die($db->error);
                        echo "<script>window.location='?page=kelas';</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    } elseif (@$_GET['action'] == 'edit') { ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data Kelas &nbsp; <a href="?page=kelas" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a></div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Nama Kelas *</label>
                            <input type="text" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Wali Kelas</label>
                            <select name="wali_kelas" class="form-control">
                                <?php
                                $sql2 = tampil_per_id("tb_pengajar", "id_pengajar = '$data[wali_kelas]'");
                                $data2 = mysqli_fetch_array($sql2);
                                if (mysqli_num_rows($sql2) > 0) {
                                    echo '<option value="'.$data2['id_pengajar'].'">'.$data2['nama_lengkap'].'</option>';
                                    echo '<option value="">- Pilih -</option>';
                                } else {
                                    echo '<option value="">- Pilih -</option>';
                                }

                                $sql_guru = mysqli_query($db, "SELECT * FROM tb_pengajar") or die($db->error);
                                while ($data_guru = mysqli_fetch_array($sql_guru)) {
                                    echo '<option value="'.$data_guru['id_pengajar'].'">'.$data_guru['nama_lengkap'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ketua Kelas</label>
                            <select name="ketua_kelas" class="form-control">
                                <?php
                                $sql3 = tampil_per_id("tb_siswa", "id_siswa = '$data[ketua_kelas]'");
                                $data3 = mysqli_fetch_array($sql3);
                                if (mysqli_num_rows($sql3) > 0) {
                                    echo '<option value="'.$data3['id_siswa'].'">'.$data3['nama_lengkap'].'</option>';
                                    echo '<option value="">- Pilih -</option>';
                                } else {
                                    echo '<option value="">- Pilih -</option>';
                                }

                                $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa WHERE id_kelas = '$data[id_kelas]'") or die($db->error);
                                while ($data_siswa = mysqli_fetch_array($sql_siswa)) {
                                    echo '<option value="'.$data_siswa['id_siswa'].'">'.$data_siswa['nama_lengkap'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                            <input type="reset" value="Reset" class="btn btn-danger" />
                        </div>
                    </form>
                    <?php
                    if (@$_POST['simpan']) {
                        $nama_kelas = @mysqli_real_escape_string($db, $_POST['nama_kelas']);
                        $wali_kelas = @mysqli_real_escape_string($db, $_POST['wali_kelas']);
                        $ketua_kelas = @mysqli_real_escape_string($db, $_POST['ketua_kelas']);
                        mysqli_query($db, "UPDATE tb_kelas SET nama_kelas = '$nama_kelas', wali_kelas = '$wali_kelas', ketua_kelas = '$ketua_kelas' WHERE id_kelas = '$id'") or die($db->error);
                        echo "<script>window.location='?page=kelas';</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    } elseif (@$_GET['action'] == 'hapus') {
        mysqli_query($db, "DELETE FROM tb_kelas WHERE id_kelas = '$id'") or die($db->error);
        echo "<script>window.location='?page=kelas';</script>";
    }
    echo "</div>";
} elseif (@$_SESSION[pengajar]) {
    if (@$_GET['action'] == '') { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
              <div class="alert-title">Info</div>
              Anda dapat menambahkan, mengubah, menghapus serta melihat data yang siswa di dalam kelas yang anda ajar.
            </div>
            </div>
                    <div class="panel-heading">Kelas yang Anda Ajar &nbsp; <a href="?page=kelas&action=tambah" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah Data</a></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="kelas">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kelas</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_ajar = mysqli_query($db, "SELECT * FROM tb_kelas_ajar JOIN tb_kelas ON tb_kelas_ajar.id_kelas = tb_kelas.id_kelas WHERE tb_kelas_ajar.id_pengajar = '$_SESSION[pengajar]'") or die($db->error);
                                if (mysqli_num_rows($sql_ajar) > 0) {
                                    while ($data_ajar = mysqli_fetch_array($sql_ajar)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data_ajar['nama_kelas']; ?></td>
                                            <td><?php echo $data_ajar['keterangan']; ?></td>
                                            <td align="center" width="240px">
                                              <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                <a href="?page=kelas&action=edit&id=<?php echo $data_ajar['id']; ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
                                                <a onclick="return confirm('Yakin akan menghapus data?');" href="?page=kelas&action=hapus&id=<?php echo $data_ajar['id']; ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                                <a href="?page=siswa&IDkelas=<?php echo $data_ajar['id_kelas']; ?>&kelas=<?php echo $data_ajar['nama_kelas']; ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-search-plus"></i>Lihat Siswa</a>
                                              </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    echo '<td colspan="5" align="center">Tidak ada data</td>';
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } elseif (@$_GET['action'] == 'tambah') { ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Data Kelas yang Anda Ajar &nbsp; <a href="?page=kelas" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a></div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Pilih Kelas *</label>
                                <select name="kelas" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    while ($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                        echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="ket" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                                <input type="reset" value="Reset" class="btn btn-danger" />
                            </div>
                        </form>
                        <?php
                        if (@$_POST['simpan']) {
                            $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
                            $ket = @mysqli_real_escape_string($db, $_POST['ket']);
                            $pengajar = @$_SESSION['pengajar'];
                            mysqli_query($db, "INSERT INTO tb_kelas_ajar VALUES('', '$kelas', '$pengajar', '$ket')") or die($db->error);
                            echo "<script>window.location='?page=kelas';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } elseif (@$_GET['action'] == 'edit') { ?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Data Kelas yang Anda Ajar &nbsp; <a href="?page=kelas" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a></div>
                    <div class="panel-body">
                    <?php
                    $sql_id_ajar = mysqli_query($db, "SELECT * FROM tb_kelas_ajar JOIN tb_kelas ON tb_kelas_ajar.id_kelas = tb_kelas.id_kelas WHERE tb_kelas_ajar.id = '$id'") or die($db->error);
                    $data_ajar2 = mysqli_fetch_array($sql_id_ajar);
                    ?>
                        <form method="post">
                            <div class="form-group">
                                <label>Pilih Kelas *</label>
                                <select name="kelas" class="form-control" required>
                                    <option value="<?php echo $data_ajar2['id_kelas']; ?>"><?php echo $data_ajar2['nama_kelas']; ?></option>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    while ($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                        echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="ket" value="<?php echo $data_ajar2['keterangan']; ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                                <input type="reset" value="Reset" class="btn btn-danger" />
                            </div>
                        </form>
                        <?php
                        if (@$_POST['simpan']) {
                            $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
                            $ket = @mysqli_real_escape_string($db, $_POST['ket']);
                            mysqli_query($db, "UPDATE tb_kelas_ajar SET id_kelas = '$kelas', id_pengajar = '$_SESSION[pengajar]', keterangan = '$ket' WHERE id = '$id'") or die($db->error);
                            echo "<script>window.location='?page=kelas';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } elseif (@$_GET['action'] == 'hapus') {
        mysqli_query($db, "DELETE FROM tb_kelas_ajar WHERE id = '$id'") or die($db->error);
        echo "<script>window.location='?page=kelas';</script>";
    }
} ?>
