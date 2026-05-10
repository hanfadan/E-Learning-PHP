<?php
error_reporting(0);
if (@$_GET['hal'] == 'tugas') { ?>
    <div class="row">
    	<div class="panel panel-default">
    	    <div class="panel-heading">
    	        Koreksi Jawaban Tugas &nbsp; <a onclick="self.history.back();" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
    	    </div>
            <form action="" method="post">
    	    <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%">
                        <?php
                        $urut = 1;
                        $sql_jawaban = mysqli_query($db, "SELECT * FROM tb_jawaban_upload JOIN tb_soal_upload ON tb_jawaban_upload.id_soal =  tb_soal_upload.id_tu WHERE tb_jawaban_upload.id_tu = '$id_tu' AND tb_jawaban_upload.id_siswa = '$_GET[id_siswa]'") or die($db->error);
                        $jumlah_soal = mysqli_num_rows($sql_jawaban);
                        while ($data_jawaban = mysqli_fetch_array($sql_jawaban)) { ?>
                            <tr>
                                <td width="10%" valign="top">( <?php echo $no++; ?> )</td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td><b>Pertanyaan :</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $data_jawaban['pertanyaan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jawaban :</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <a href="./jawaban_tugas/<?php echo $data_jawaban['jawaban']; ?>" id="klik" isi="<?php echo $data_tugas['id_tugas']; ?>" class="btn btn-icon icon-left btn-warning" target="_blank"><i class="fas fa-download"></i>Download</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Nilai :</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="10">10
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="20">20
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="30">30
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="40">40
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="50">50
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="60">60
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="70">70
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="80">80
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="90">90
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="100">100
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <input type="submit" name="simpan_koreksi" value="Simpan" class="btn btn-primary btn-sm" />
                <input type="reset" value="Reset" class="btn btn-danger btn-sm" />
            </div>
            </form>
            <?php
            $nilai = 0;
            if (@$_POST['simpan_koreksi']) {
                foreach (@$_POST['nilai_upload'] as $key => $value) {
                    $nilai = $nilai + $value;
                }
                $nilai_total = $nilai / $jumlah_soal;
                mysqli_query($db, "INSERT INTO tb_nilai_upload VALUES('', '$id_tu', '$_GET[id_siswa]', '$nilai_total')") or die($db->error);
                echo "<script>window.location='?page=tugas&action=pesertakoreksi&id_tu=".$id_tu."';</script>";
            }
            ?>
    	</div>
    </div>
<?php
} elseif (@$_GET['hal'] == 'edittugas') { ?>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Koreksi Jawaban Tugas &nbsp; <a onclick="self.history.back();" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
            </div>
            <form action="" method="post">
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%">
                        <?php
                        $urut = 1;
                        $sql_jawaban = mysqli_query($db, "SELECT * FROM tb_jawaban_upload JOIN tb_soal_upload ON tb_jawaban_upload.id_soal =  tb_soal_upload.id_tu WHERE tb_jawaban_upload.id_tu = '$id_tu' AND tb_jawaban_upload.id_siswa = '$_GET[id_siswa]'") or die($db->error);
                        $jumlah_soal = mysqli_num_rows($sql_jawaban);
                        while ($data_jawaban = mysqli_fetch_array($sql_jawaban)) { ?>
                            <tr>
                                <td width="10%" valign="top">( <?php echo $no++; ?> )</td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td><b>Pertanyaan :</b></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $data_jawaban['pertanyaan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jawaban :</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                              <a href="./jawaban_tugas/<?php echo $data_jawaban['jawaban']; ?>" id="klik" isi="<?php echo $data_tugas['id_tugas']; ?>" class="btn btn-icon icon-left btn-warning" target="_blank"><i class="fas fa-download"></i>Download</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Nilai <small>(Untuk mengedit silahkan pilih ulang nilainya)</small> :</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="10">10
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="20">20
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="30">30
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="40">40
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="50">50
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="60">60
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="70">70
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="80">80
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="90">90
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_upload[<?php echo $urut++; ?>]" value="100">100
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <input type="submit" name="simpan_koreksi" value="Simpan" class="btn btn-primary btn-sm" />
                <input type="reset" value="Reset" class="btn btn-danger btn-sm" />
            </div>
            </form>
            <?php
            $nilai = 0;
            if (@$_POST['simpan_koreksi']) {
                foreach (@$_POST['nilai_upload'] as $key => $value) {
                    $nilai = $nilai + $value;
                }
                $nilai_total = $nilai / $jumlah_soal;
                mysqli_query($db, "UPDATE tb_nilai_upload SET nilai = '$nilai_total' WHERE id = '$_GET[id_nilai]'") or die($db->error);
                echo "<script>window.location='?page=tugas&action=pesertakoreksi&id_tu=".$id_tu."';</script>";
            }
            ?>
        </div>
    </div>
<?php
} ?>
