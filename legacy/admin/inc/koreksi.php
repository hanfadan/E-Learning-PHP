<?php
error_reporting(0);
if (@$_GET['hal'] == 'essay') { ?>
    <div class="row">
    	<div class="panel panel-default">
    	    <div class="panel-heading">
    	        Koreksi Jawaban Essay &nbsp; <a onclick="self.history.back();" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
    	    </div>
            <form action="" method="post">
    	    <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%">
                        <?php
                        $urut = 1;
                        $sql_jawaban = mysqli_query($db, "SELECT * FROM tb_jawaban JOIN tb_soal_essay ON tb_jawaban.id_soal =  tb_soal_essay.id_essay WHERE tb_jawaban.id_tc = '$id_tc' AND tb_jawaban.id_siswa = '$_GET[id_siswa]'") or die($db->error);
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
                                            <td><?php echo $data_jawaban['jawaban']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Presentase nilai tiap soal :</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="10">10
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="20">20
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="30">30
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="40">40
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="50">50
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="60">60
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="70">70
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="80">80
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="90">90
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="100">100
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
                foreach (@$_POST['nilai_essay'] as $key => $value) {
                    $nilai = $nilai + $value;
                }
                $nilai_total = $nilai / $jumlah_soal;
                mysqli_query($db, "INSERT INTO tb_nilai_essay VALUES('', '$id_tc', '$_GET[id_siswa]', '$nilai_total')") or die($db->error);
                echo "<script>window.location='?page=quiz&action=pesertakoreksi&id_tc=".$id_tc."';</script>";
            }
            ?>
    	</div>
    </div>
<?php
} elseif (@$_GET['hal'] == 'editessay') { ?>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Koreksi Jawaban Essay &nbsp; <a onclick="self.history.back();" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
            </div>
            <form action="" method="post">
            <div class="panel-body">
                <div class="table-responsive">
                    <table width="100%">
                        <?php
                        $urut = 1;
                        $sql_jawaban = mysqli_query($db, "SELECT * FROM tb_jawaban JOIN tb_soal_essay ON tb_jawaban.id_soal =  tb_soal_essay.id_essay WHERE tb_jawaban.id_tc = '$id_tc' AND tb_jawaban.id_siswa = '$_GET[id_siswa]'") or die($db->error);
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
                                            <td><?php echo $data_jawaban['jawaban']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Presentase tiap soal <small>(Untuk mengedit silahkan pilih ulang nilainya)</small> :</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="10">10
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="20">20
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="30">30
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="40">40
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="50">50
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="60">60
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="70">70
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="80">80
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="90">90
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="nilai_essay[<?php echo $urut++; ?>]" value="100">100
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
                foreach (@$_POST['nilai_essay'] as $key => $value) {
                    $nilai = $nilai + $value;
                }
                $nilai_total = $nilai / $jumlah_soal;
                mysqli_query($db, "UPDATE tb_nilai_essay SET nilai = '$nilai_total' WHERE id = '$_GET[id_nilai]'") or die($db->error);
                echo "<script>window.location='?page=quiz&action=pesertakoreksi&id_tc=".$id_tc."';</script>";
            }
            ?>
        </div>
    </div>
<?php
} ?>
