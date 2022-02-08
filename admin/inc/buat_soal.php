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

<div class="row">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        <a onclick="self.history.back();" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a> &nbsp;
	        Buat Jenis Soal : <a href="?page=quiz&action=buatsoal&hal=soalpilgan&id=<?php echo $id; ?>" class="btn btn-primary btn-sm"><i class="fas fa-list"></i> Pilihan Ganda</a>
	        <a href="?page=quiz&action=buatsoal&hal=soalessay&id=<?php echo $id; ?>" class="btn btn-primary btn-sm"><i class="fas fa-align-center"></i> Essay</a>
	    </div>
		<?php
        if (@$_GET['hal'] == "soalpilgan" || @$_GET['hal'] == "soalessay") { ?>
				</br>
		    <div class="panel-heading">
		        Anda juga dapat memilih soal dibawah untuk kelas lain yang sesuai dengan topik kuis ini.
		        <form method="post" enctype="multipart/form-data">Pilih kelas lain <i><small>(centang)</small></i> :
		        <?php
                $a = array();
                $sql_tq_ini = mysqli_query($db, "SELECT * FROM tb_topik_cbt WHERE id_tc = '$id'") or die($db->error);
                $data_tq_ini = mysqli_fetch_array($sql_tq_ini);
                $kelas_ini = $data_tq_ini['id_kelas'];
                   $judul = $data_tq_ini['judul'];
                   $id_mapel = $data_tq_ini['id_mapel'];
                   $sql_kelas_lain = mysqli_query($db, "SELECT * FROM tb_topik_cbt WHERE judul = '$judul' AND id_mapel = '$id_mapel' AND id_kelas != '$kelas_ini'") or die($db->error);
                while ($data_kelas_lain = mysqli_fetch_array($sql_kelas_lain)) {
                    $id_kls_lain = $data_kelas_lain['id_kelas'];
                    $sql_nm_kls = mysqli_query($db, "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kls_lain'") or die($db->error);
                    $data_nm_kls = mysqli_fetch_array($sql_nm_kls); ?>
	                <label class="checkbox-inline">
	                    <input type="checkbox" name="kls[]" value="<?php echo $data_nm_kls['nama_kelas']; ?>"><?php echo $data_nm_kls['nama_kelas']; ?>
	                </label>
					<?php
                    array_push($a, $data_kelas_lain['id_tc']);
                }
                $cek = mysqli_num_rows($sql_kelas_lain);
                // print_r($a);
                ?>
		    </div>
		<?php } ?>
	</br>
		<div class="alert alert-info alert-has-icon">
<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
<div class="alert-body">
<div class="alert-title">Info</div>
Perhatian, pembuatan soal wajib ada pilihan gandanya, jangan essay saja. Kalo soal pilihan ganda saja tanpa essay atau ada keduanya tidak masalah.
</div>
</div>
	</div>
</div>

<?php
if (@$_GET['hal'] == "soalpilgan") { ?>
	<div class="row">
		<div class="panel panel-default">
		    <div class="panel-heading">Buat Soal Pilihan Ganda</div>
		    <div class="panel-body">
		    	<?php $sql_jumlah_pilgan = mysqli_query($db, "SELECT * FROM tb_soal_pilgan WHERE id_tc = '$id'") or die($db->error); ?>
					<div class="col-md-2">
						<label>Pertanyaan No. [ <?php echo mysqli_num_rows($sql_jumlah_pilgan) + 1; ?> ]</label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<textarea name="pertanyaan" class="form-control" rows="2" required></textarea>
						</div>
					</div>

					<div class="col-md-2">
						<label>Gambar <sup>(Optional)</sup></label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<input type="file" name="gambar" class="form-control" />
						</div>
					</div>

					<div class="col-md-2">
						<label>Pilihan A</label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<textarea name="pilA" class="form-control" rows="1" required></textarea>
						</div>
					</div>
					<div class="col-md-2">
						<label>Pilihan B</label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<textarea name="pilB" class="form-control" rows="1" required></textarea>
						</div>
					</div>
					<div class="col-md-2">
						<label>Pilihan C</label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<textarea name="pilC" class="form-control" rows="1" required></textarea>
						</div>
					</div>
					<div class="col-md-2">
						<label>Pilihan D</label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<textarea name="pilD" class="form-control" rows="1" required></textarea>
						</div>
					</div>
					<div class="col-md-2">
						<label>Pilihan E</label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<textarea name="pilE" class="form-control" rows="1" required></textarea>
						</div>
	                </div>
	                <div class="col-md-2">
						<label>Kunci Jawaban</label>
					</div>
					<div class="col-md-10">
						<div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="kunci" value="A">A
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="kunci" value="B">B
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="kunci" value="C">C
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="kunci" value="D">D
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="kunci" value="E">E
                            </label>
						</div>
						<div class="form-group">
	                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
	                        <input type="reset" value="Reset" class="btn btn-danger" />
	                    </div>
	                </div>
	            <?php
                if (@$_POST['simpan']) {
                    $pertanyaan = @mysqli_real_escape_string($db, $_POST['pertanyaan']);
                    $pilA = @mysqli_real_escape_string($db, $_POST['pilA']);
                    $pilB = @mysqli_real_escape_string($db, $_POST['pilB']);
                    $pilC = @mysqli_real_escape_string($db, $_POST['pilC']);
                    $pilD = @mysqli_real_escape_string($db, $_POST['pilD']);
                    $pilE = @mysqli_real_escape_string($db, $_POST['pilE']);
                    $kunci = @mysqli_real_escape_string($db, $_POST['kunci']);

                    $sumber = @$_FILES['gambar']['tmp_name'];
                    $target = 'img/gambar_soal_pilgan/';
                    $nama_gambar = @$_FILES['gambar']['name'];

                    $b = array();
                    for ($o = 0; $o < $cek; $o++) {
                        $kls = @mysqli_real_escape_string($db, $_POST['kls'][$o]);
                        array_push($b, $kls);

                        if (in_array($kls, $b)) {
                            // echo $kls;

                            if ($kls != "") {
                                $sql_tq_kls = mysqli_query($db, "SELECT * FROM tb_topik_cbt JOIN tb_kelas WHERE id_tc = '$a[$o]' AND nama_kelas = '$kls'") or die($db->error);
                                $data_tq_kls = mysqli_fetch_array($sql_tq_kls);
                                $id_tc_kls = $data_tq_kls['id_tc'];
                                // echo $id_tc_kls."+".$data_tq_kls['id_kelas'];

                                move_uploaded_file($sumber, $target.$nama_gambar);
                                mysqli_query($db, "INSERT INTO tb_soal_pilgan VALUES('', '$id_tc_kls', '$pertanyaan', '$nama_gambar', '$pilA', '$pilB', '$pilC', '$pilD', '$pilE', '$kunci', now())") or die($db->error);
                                echo '<script>window.location="?page=quiz&action=daftarsoal&hal=pilgan&id='.$id.'"</script>';
                            }
                        }
                    }
                    // print_r($b);

                    move_uploaded_file($sumber, $target.$nama_gambar);
                    mysqli_query($db, "INSERT INTO tb_soal_pilgan VALUES('', '$id', '$pertanyaan', '$nama_gambar', '$pilA', '$pilB', '$pilC', '$pilD', '$pilE', '$kunci', now())") or die($db->error);
                    echo '<script>window.location="?page=quiz&action=daftarsoal&hal=pilgan&id='.$id.'"</script>';
                } ?>
		    </div>
		</div>
	</div>
<?php
} elseif (@$_GET['hal'] == "soalessay") { ?>
	<div class="row">
		<div class="panel panel-default">
		    <div class="panel-heading">Buat Soal Essay</div>
		    <div class="panel-body">
		    	<?php
                $sql_jumlah_essay = mysqli_query($db, "SELECT * FROM tb_soal_essay WHERE id_tc = '$id'") or die($db->error); ?>
					<div class="col-md-2">
						<label>Pertanyaan No. [ <?php echo mysqli_num_rows($sql_jumlah_essay) + 1; ?> ]</label>
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
                    $target = 'img/gambar_soal_essay/';
                    $nama_gambar = @$_FILES['gambar']['name'];

                    $c = array();
                    for ($p = 0; $p < $cek; $p++) {
                        $kls2 = @mysqli_real_escape_string($db, $_POST['kls'][$p]);
                        array_push($c, $kls2);
                        if (in_array($kls2, $c)) {
                            if ($kls2 != "") {
                                $sql_tq_kls2 = mysqli_query($db, "SELECT * FROM tb_topik_cbt JOIN tb_kelas WHERE id_tc = '$a[$p]' AND nama_kelas = '$kls2'") or die($db->error);
                                $data_tq_kls2 = mysqli_fetch_array($sql_tq_kls2);
                                $id_tc_kls2 = $data_tq_kls2['id_tc'];

                                move_uploaded_file($sumber, $target.$nama_gambar);
                                mysqli_query($db, "INSERT INTO tb_soal_essay VALUES('', '$id_tc_kls2', '$pertanyaan', '$nama_gambar', now())") or die($db->error);
                            }
                        }
                    }

                    move_uploaded_file($sumber, $target.$nama_gambar);
                    mysqli_query($db, "INSERT INTO tb_soal_essay VALUES('', '$id', '$pertanyaan', '$nama_gambar', now())") or die($db->error);
                    echo '<script>window.location="?page=quiz&action=daftarsoal&hal=essay&id='.$id.'"</script>';
                }
                ?>
		    </div>
		</div>
	</div>
	<?php
} ?>
</form>
