<?php
$sql_upload = mysqli_query($db, "SELECT * FROM tb_soal_upload WHERE id_tu = '$id'") or die($db->error);
?>
<div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="?page=tugas" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a> &nbsp;
			Lihat Daftar Jenis Soal : <a href="?page=tugas&action=daftarsoal&hal=upload&id=<?php echo $id; ?>" class="btn btn-primary btn-sm"><i class="fas fa-file-upload"></i>Tugas Upload (<?php echo mysqli_num_rows($sql_upload); ?> soal)</a>
		</div>
		<?php
        if (@$_GET['hal'] == "upload") { ?>
			<div class="panel-body">
				<fieldset>
					<legend>Info Tugas </legend>
					<?php
                    $sql_tq = mysqli_query($db, "SELECT * FROM tb_topik_tugas JOIN tb_kelas ON tb_topik_tugas.id_kelas = tb_kelas.id_kelas JOIN tb_mapel ON tb_topik_tugas.id_mapel = tb_mapel.id WHERE id_tu = '$id'") or die($db->error);
                    $data_tq = mysqli_fetch_array($sql_tq);
                    ?>
					<table class="table table-striped table-bordered table-hover">
						<tr>
							<td>Judul</td>
							<td align="center" width="50px">:</td>
							<td><?php echo $data_tq['judul']; ?></td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td align="center" width="50px">:</td>
							<td><?php echo $data_tq['nama_kelas']; ?></td>
						</tr>
						<tr>
							<td>Mata Pelajaran</td>
							<td align="center" width="50px">:</td>
							<td><?php echo $data_tq['mapel']; ?></td>
						</tr>
					</table>
				</fieldset>
			</div>
		<?php
        } ?>
	</div>
</div>
<?php
$idsoal = @$_GET['idsoal'];
$k = 1;
$ke = @$_GET['ke'];

if (@$_GET['hal'] == "upload") { ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">Soal Upload &nbsp; <a href="?page=tugas&action=buatsoal&hal=soalupload&id=<?php echo $id; ?>" class="btn btn-primary btn-sm">Tambah Soal Upload</a></div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Gambar</th>
                <th>Tanggal Pembuatan</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
            <?php
                          if (mysqli_num_rows($sql_upload) > 0) {
                              while ($data_upload = mysqli_fetch_array($sql_upload)) { ?>
              <tr>
                <td align="center" width="40px"><?php echo $no++; ?></td>
                <td><?php echo $data_upload['pertanyaan']; ?></td>
                <td align="center" width="150px">
                  <?php
                                      if ($data_upload['gambar'] != '') {
                                          echo '<img src="img/gambar_soal_upload/'.$data_upload['gambar'].'" width="100px" />';
                                      } else {
                                          echo "<i>Tidak ada gambar</i>";
                                      } ?>
                </td>
                <td align="center" width="160px"><?php echo tgl_indo($data_upload['tgl_buat']); ?></td>
                <td align="center" width="120px">
                  <a href="?page=tugas&action=daftarsoal&hal=editsoalupload&id=<?php echo $id; ?>&idsoal=<?php echo $data_upload['id_upload']; ?>&ke=<?php echo $k++; ?>" class="btn btn-info btn-sm"><i class="far fa-edit"></i>Edit</a>
                  <a onclick="return confirm('Yakin akan menghapus data?');" href="?page=tugas&action=daftarsoal&hal=hapussoalupload&id=<?php echo $id; ?>&idsoal=<?php echo $data_upload['id_upload']; ?>" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>Hapus</a>
                </td>
              </tr>
              <?php
                              }
                          } else {
                              echo '<td colspan="5" align="center">Data soal upload tidak ditemukan</td>';
                          } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
} elseif (@$_GET['hal'] == "editsoalupload") { ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">Edit Soal Upload</div>
      <div class="panel-body">
      <?php
                                      $sql_upload_id = mysqli_query($db, "SELECT * FROM tb_soal_upload WHERE id_upload = '$idsoal'") or die($db->error);
                                      $data_upload_id = mysqli_fetch_array($sql_upload_id);
                                      ?>
        <form method="post" enctype="multipart/form-data">
          <div class="col-md-2">
            <label>Pertanyaan No. [ <?php echo $ke; ?> ]</label>
          </div>
          <div class="col-md-10">
            <div class="form-group">
              <textarea name="pertanyaan" class="form-control" rows="3" required><?php echo $data_upload_id['pertanyaan']; ?></textarea>
            </div>
          </div>

          <div class="col-md-2">
            <label>Gambar <sup>(Optional)</sup></label>
          </div>
          <div class="col-md-10">
            <div class="form-group">
              <input type="file" name="gambar" class="form-control" />
              <?php
                                                                      if ($data_upload_id['gambar'] != '') {
                                                                          if (@$_GET['gbr'] != 'del') { ?>
                  <div style="margin-top:5px;">
                    <img width="150px" src="../admin/img/gambar_soal_upload/<?php echo $data_upload_id['gambar']; ?>" />
                    <br /> <small><a href="?page=quiz&action=daftarsoal&hal=editsoalupload&id=<?php echo $id; ?>&idsoal=<?php echo $data_upload_id['id_upload']; ?>&ke=<?php echo $ke; ?>&gbr=del">Hapus Gambar</a></small>
                  </div>
                <?php }
                                                                      } ?>
            </div>
            <div class="form-group">
                          <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                          <input type="reset" value="Reset" class="btn btn-danger" />
                      </div>
          </div>
              </form>
              <?php
                                              if (@$_POST['simpan']) {
                                                  $pertanyaan = @mysqli_real_escape_string($db, $_POST['pertanyaan']);

                                                  $sumber = @$_FILES['gambar']['tmp_name'];
                                                  $target = 'img/gambar_soal_upload/';
                                                  $nama_gambar = @$_FILES['gambar']['name'];

                                                  if (@$_GET['gbr'] == 'del') {
                                                      if ($nama_gambar == '') {
                                                          mysqli_query($db, "UPDATE tb_soal_upload SET pertanyaan = '$pertanyaan', gambar = '' WHERE id_upload = '$idsoal'") or die($db->error);
                                                      // echo "gambar benar2 dihapus";
                                                      } else {
                                                          move_uploaded_file($sumber, $target.$nama_gambar);
                                                          mysqli_query($db, "UPDATE tb_soal_upload SET pertanyaan = '$pertanyaan', gambar = '$nama_gambar' WHERE id_upload = '$idsoal'") or die($db->error);
                                                          // echo "gambar dihapus dan diupload baru";
                                                      }
                                                  } else {
                                                      if ($nama_gambar == '') {
                                                          mysqli_query($db, "UPDATE tb_soal_upload SET pertanyaan = '$pertanyaan' WHERE id_upload = '$idsoal'") or die($db->error);
                                                      // echo "gambar tidak dihapus dan tidak diperbarui (tetap)";
                                                      } else {
                                                          move_uploaded_file($sumber, $target.$nama_gambar);
                                                          mysqli_query($db, "UPDATE tb_soal_upload SET pertanyaan = '$pertanyaan', gambar = '$nama_gambar' WHERE id_upload = '$idsoal'") or die($db->error);
                                                          // echo "gambar diperbarui dari sebelumnya";
                                                      }
                                                  }
                                                  echo '<script>window.location="?page=quiz&action=daftarsoal&hal=upload&id='.$id.'"</script>';
                                              }?>

								<?php
} elseif (@$_GET['hal'] == "hapussoalupload") {
                                                  mysqli_query($db, "DELETE FROM tb_soal_upload WHERE id_upload = '$idsoal'") or die($db->error);
                                                  echo "<script>window.location='?page=tugas&action=daftarsoal&hal=upload&id=".$id."';</script>";
                                              }  ?>
