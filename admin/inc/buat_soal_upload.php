<div class="row">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        <a onclick="self.history.back();" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a> &nbsp;
	        Buat Jenis Soal : <a href="?page=tugas&action=buatsoal&hal=soalupload&id=<?php echo $id; ?>" class="btn btn-primary btn-sm"><i class="fas fa-file-upload"></i>Tugas Upload</a> <a href="?page=importtugas" class="btn btn-primary btn-sm"><i class="far fa-save"></i> Import Data</a>
	    </div>
		<?php
        if (@$_GET['hal'] == "soalupload") { ?>
          <div class="panel-heading">
  		        Anda juga dapat memilih soal dibawah untuk kelas lain yang sesuai dengan topik kuis ini.
  		        <form method="post" enctype="multipart/form-data">Pilih kelas lain <i><small>(centang)</small></i> :
  		        <?php
                  $a = array();
                  $sql_tq_ini = mysqli_query($db, "SELECT * FROM tb_topik_tugas WHERE id_tu = '$id'") or die($db->error);
                  $data_tq_ini = mysqli_fetch_array($sql_tq_ini);
                  $kelas_ini = $data_tq_ini['id_kelas'];
                     $judul = $data_tq_ini['judul'];
                     $id_mapel = $data_tq_ini['id_mapel'];
                     $sql_kelas_lain = mysqli_query($db, "SELECT * FROM tb_topik_tugas WHERE judul = '$judul' AND id_mapel = '$id_mapel' AND id_kelas != '$kelas_ini'") or die($db->error);
                  while ($data_kelas_lain = mysqli_fetch_array($sql_kelas_lain)) {
                      $id_kls_lain = $data_kelas_lain['id_kelas'];
                      $sql_nm_kls = mysqli_query($db, "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kls_lain'") or die($db->error);
                      $data_nm_kls = mysqli_fetch_array($sql_nm_kls); ?>
  	                <label class="checkbox-inline">
  	                    <input type="checkbox" name="kls[]" value="<?php echo $data_nm_kls['nama_kelas']; ?>"><?php echo $data_nm_kls['nama_kelas']; ?>
  	                </label>
  					<?php
                      array_push($a, $data_kelas_lain['id_tu']);
                  }
                  $cek = mysqli_num_rows($sql_kelas_lain);
                  // print_r($a);
                  ?>
  		    </div>
		<?php } ?>
	</div>
</div>

<?php
if (@$_GET['hal'] == "soalupload") { ?>
  <div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Buat Tugas Upload</div>
        <div class="panel-body">
          <?php
                  $sql_jumlah_upload = mysqli_query($db, "SELECT * FROM tb_soal_upload WHERE id_tu = '$id'") or die($db->error); ?>
          <div class="col-md-2">
            <label>Pertanyaan No. [ <?php echo mysqli_num_rows($sql_jumlah_upload) + 1; ?> ]</label>
          </div>
          <div class="col-md-10">
            <div class="form-group">
              <textarea name="pertanyaan" class="form-control" rows="3" required></textarea>
            </div>
          </div>

          <div class="col-md-2">
            <label>Gambar <sup>(Optional)</sup></label>
          </div>
          <div class="col-md-10">
            <div class="form-group">
              <input type="file" name="gambar" class="form-control" />
            </div>
            <div class="form-group">
                          <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                          <input type="reset" value="Reset" class="btn btn-danger" />
                      </div>
          </div>
              <?php
                  if (@$_POST['simpan']) {
                      $pertanyaan = @mysqli_real_escape_string($db, $_POST['pertanyaan']);

                      $sumber = @$_FILES['gambar']['tmp_name'];
                      $target = 'img/gambar_soal_upload/';
                      $nama_gambar = @$_FILES['gambar']['name'];

                      $c = array();
                      for ($p = 0; $p < $cek; $p++) {
                          $kls1 = @mysqli_real_escape_string($db, $_POST['kls'][$p]);
                          array_push($c, $kls1);
                          if (in_array($kls1, $c)) {
                              if ($kls1 != "") {
                                  $sql_tq_kls1 = mysqli_query($db, "SELECT * FROM tb_topik_tugas JOIN tb_kelas WHERE id_tu = '$a[$p]' AND nama_kelas = '$kls1'") or die($db->error);
                                  $data_tq_kls1 = mysqli_fetch_array($sql_tq_kls1);
                                  $id_tu_kls1 = $data_tq_kls1['id_tu'];

                                  move_uploaded_file($sumber, $target.$nama_gambar);
                                  mysqli_query($db, "INSERT INTO tb_soal_upload VALUES('', '$id_tu_kls1', '$pertanyaan', '$nama_gambar', now())") or die($db->error);
                              }
                          }
                      }

                      move_uploaded_file($sumber, $target.$nama_gambar);
                      mysqli_query($db, "INSERT INTO tb_soal_upload VALUES('', '$id', '$pertanyaan', '$nama_gambar', now())") or die($db->error);
                      echo '<script>window.location="?page=tugas&action=daftarsoal&hal=upload&id='.$id.'"</script>';
                  }
                  ?>
        </div>
    </div>
  </div>
		<?php
    } ?>
</form>
