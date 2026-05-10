<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Manajemen Pengumuman</h1>
    </div>
</div>

<script>
$(document).ready( function () {
  var table = $('#pengumuman').DataTable();

// #myInput is a <input type="text"> element
$('#myInput').on( 'keyup', function () {
    table.search( this.value ).draw();
} );
} );
  </script>

<script>
$(document).ready(function() {
  $('textarea').summernote({
    height: 300,
    toolbar: [
['style', ['style']],
['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
['fontname', ['fontname']],
['color', ['color']],
['para', ['ul', 'ol', 'paragraph']],
['table', ['table']],
['insert', ['link', 'picture', 'video']],
['view', ['fullscreen', 'codeview', 'help']],
['height', ['height']],
],
    dialogsInBody: true,
   callbacks: {
      onImageUpload : function(files, editor, welEditable) {

           for(var i = files.length - 1; i >= 0; i--) {
                   sendFile(files[i], this);
          }
      }
  }
});
});
  function sendFile(file, el) {
  var form_data = new FormData();
  form_data.append('file', file);
  $.ajax({
      data: form_data,
      type: "POST",
      url: 'editor-upload.php',
      cache: false,
      contentType: false,
      processData: false,
      success: function(url) {
          $(el).summernote('editor.insertImage', url);
        }
    });
    }
</script>
<?php
if (@$_GET['action'] == '') { ?>
	<div class="row">
		<div class="col-md-12">
	        <div class="panel panel-default">
            <div class="alert alert-info alert-has-icon">
      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
      <div class="alert-body">
        <div class="alert-title">Info</div>
        Anda dapat menambahkan , mengubah dan mengahpus pengumuman yang akan ditampilkan ke siswa.
      </div>
      </div>
	            <div class="panel-heading">Data Pengumuman &nbsp;
                <a href="?page=pengumuman&action=tambah" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah Data</a> &nbsp;
              </div>
	            <div class="panel-body">
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover" id="pengumuman">
	                        <thead>
	                            <tr>
	                                <th>No</th>
	                                <th>Judul</th>
                                  <th>Kelas</th>
	                                <th>Isi</th>
	                                <th>Tanggal Posting</th>
	                                <th>Penerbit</th>
	                                <th>Status</th>
	                                <th>Opsi</th>
	                            </tr>
	                        </thead>
	                        <tbody>
							<?php
                            $no = 1;
                            if (@$_SESSION['admin']) {
                                $sql_pengumuman = mysqli_query($db, "SELECT * FROM tb_pengumuman JOIN tb_kelas ON tb_pengumuman.kelas = tb_kelas.id_kelas") or die($db->error);
                            } elseif (@$_SESSION['pengajar']) {
                                $sql_pengumuman = mysqli_query($db, "SELECT * FROM tb_pengumuman JOIN tb_kelas ON tb_pengumuman.kelas = tb_kelas.id_kelas WHERE penerbit = '$_SESSION[pengajar]'") or die($db->error);
                            }

                            if (mysqli_num_rows($sql_pengumuman) > 0) {
                                while ($data_pengumuman = mysqli_fetch_array($sql_pengumuman)) { ?>
									<tr>
										<td align="center"><?php echo $no++; ?></td>
										<td><?php echo $data_pengumuman['judul']; ?></td>
                    <td><?php echo $data_pengumuman['nama_kelas']; ?></td>
										<td><?php echo substr($data_pengumuman['isi'], 0, 50)." ..."; ?></td>
										<td><?php echo tgl_indo($data_pengumuman['tgl_posting']); ?></td>
										<td>
											<?php
                                            if ($data_pengumuman['penerbit'] == 'admin') {
                                                echo "Admin";
                                            } else {
                                                $sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$data_pengumuman[penerbit]'") or die($db->error);
                                                $data_pengajar = mysqli_fetch_array($sql_pengajar);
                                                echo $data_pengajar['nama_lengkap'];
                                            } ?>
										</td>
										<td><?php echo ucfirst($data_pengumuman['status']); ?></td>
										<td align="center" width="90px">
                      <div class="btn-group mb-2" role="group" aria-label="Basic example">
											<a href="?page=pengumuman&action=edit&id=<?php echo $data_pengumuman['id_pengumuman']; ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
	                                        <a onclick="return confirm('Yakin akan menghapus data?');" href="?page=pengumuman&action=hapus&id=<?php echo $data_pengumuman['id_pengumuman']; ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                        </div>
                                        </td>
									</tr>
								<?php
                                }
                            } else {
                                echo '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
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
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Pengumuman &nbsp; <a href="?page=pengumuman" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a></div>
                <div class="panel-body">
                	<form method="post">
                    	<div class="form-group">
                            <label>Judul *</label>
                            <input type="text" name="judul" class="form-control" required />
                        </div>
                        <div class="form-group">
                        <label>Kelas *</label>
                        <select name="kelas" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            $sql_kelas = mysqli_query($db, "SELECT * from tb_kelas") or die($db->error);
                            while ($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                            } ?>
                        </select>
                      </div>
                        <div class="form-group">
                            <label>Isi *</label>
                            <textarea name="isi" class="form-control" rows="15" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status Terbit</label>
                            <select name="status" class="form-control">
								<option value="aktif">Aktif</option>
								<option value="tidak aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
	                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
	                        <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </form>
                    <?php
                    if (@$_POST['simpan']) {
                        $judul = @mysqli_real_escape_string($db, $_POST['judul']);
                        $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
                        $isi = @mysqli_real_escape_string($db, $_POST['isi']);
                        $status = @mysqli_real_escape_string($db, $_POST['status']);
                        if (@$_SESSION[admin]) {
                            mysqli_query($db, "INSERT INTO tb_pengumuman VALUES('', '$judul', '$kelas', '$isi', now(), 'admin', '$status')") or die($db->error);
                        } elseif (@$_SESSION[pengajar]) {
                            mysqli_query($db, "INSERT INTO tb_pengumuman VALUES('', '$judul', '$kelas', '$isi', now(), '$_SESSION[pengajar]', '$status')") or die($db->error);
                        }
                        echo '<script>window.location="?page=pengumuman";</script>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php
} elseif (@$_GET['action'] == 'edit') { ?>
	<div class="row">
		<div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Pengumuman &nbsp; <a href="?page=pengumuman" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a></div>
                <div class="panel-body">
                <?php
                $sql_pengumumanID = mysqli_query($db, "SELECT * FROM tb_pengumuman WHERE id_pengumuman = '$_GET[id]'") or die($db->error);
                $data_pengumumanID = mysqli_fetch_array($sql_pengumumanID); ?>
                	<form method="post">
                    	<div class="form-group">
                            <label>Judul *</label>
                            <input type="text" name="judul" value="<?php echo $data_pengumumanID['judul']; ?>" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Kelas *</label>
                            <select name="kelas" class="form-control" rows="15" required>
                              <option value="<?php echo $data_pengumumanID['kelas']; ?>"></option>
                              <?php
                              $sql_kelas = mysqli_query($db, "SELECT * from tb_kelas") or die($db->error);
                              while ($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                  echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                              } ?>
                              </select>
                        </div>
                        <div class="form-group">
                            <label>Isi *</label>
                            <textarea name="isi" class="form-control" rows="15" required><?php echo $data_pengumumanID['isi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status Terbit</label>
                            <select name="status" class="form-control">
								<option value="aktif">Aktif</option>
								<option value="tidak aktif" <?php if ($data_pengumumanID['status'] == 'tidak aktif') {
                                  echo "selected";
                              } ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
	                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
	                        <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </form>
                    <?php
                    if (@$_POST['simpan']) {
                        $judul = @mysqli_real_escape_string($db, $_POST['judul']);
                        $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
                        $isi = @mysqli_real_escape_string($db, $_POST['isi']);
                        $status = @mysqli_real_escape_string($db, $_POST['status']);
                        mysqli_query($db, "UPDATE tb_pengumuman SET judul = '$judul', kelas = '$kelas', isi = '$isi', status = '$status' WHERE id_pengumuman = '$_GET[id]'") or die($db->error);
                        echo '<script>window.location="?page=pengumuman";</script>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php
} elseif (@$_GET['action'] == 'hapus') {
                        mysqli_query($db, "DELETE FROM tb_pengumuman WHERE id_pengumuman = '$_GET[id]'") or die($db->error);
                        echo '<script>window.location="?page=pengumuman";</script>';
                    } ?>
