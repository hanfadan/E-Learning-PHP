<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Nilai Tugas</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <?php
            $no = 1;
            $sql_cek_nilai_tugas = mysqli_query($db, "SELECT * FROM tb_nilai_upload JOIN tb_topik_tugas ON tb_nilai_upload.id_tu = tb_topik_tugas.id_tu JOIN tb_mapel ON tb_topik_tugas.id_mapel = tb_mapel.id WHERE id_siswa = '$_SESSION[siswa]'") or die($db->error);
            ?>
            <div class="panel-heading">Data Nilai Tugas Anda</div>
            <div class="panel-body">
                <div class="table-responsive">
                	<table class="table table-striped table-bordered table-hover" id="example">
                		<tr>
                			<th>#</th>
                			<th>Mata Pelajaran</th>
                			<th>Judul Tugas</th>
                			<th>Nilai Total</th>
                		</tr>
                		<?php
                        if (mysqli_num_rows($sql_cek_nilai_tugas) > 0) {
                            while ($data_nilai_pilgan = mysqli_fetch_array($sql_cek_nilai_tugas)) { ?>
                				<tr>
	                				<td><?php echo $no++; ?></td>
                					<td><?php echo $data_nilai_pilgan['mapel']; ?></td>
                					<td><?php echo $data_nilai_pilgan['judul']; ?></td>
                					<?php
                                    $sql_cek_jawaban = mysqli_query($db, "SELECT * FROM tb_jawaban_upload WHERE id_tu = '$data_nilai_pilgan[id_tu]' AND id_siswa = '$_SESSION[siswa]'") or die($db->error);
                                    $data_jawaban = mysqli_fetch_array($sql_cek_jawaban);
                                    if (mysqli_num_rows($sql_cek_jawaban) > 0) {
                                        $sql_cek_nilai_tugas = mysqli_query($db, "SELECT * FROM tb_nilai_upload WHERE id_tu = '$data_nilai_pilgan[id_tu]' AND id_siswa = '$_SESSION[siswa]'") or die($db->error);
                                        $data_nilai_tugas = mysqli_fetch_array($sql_cek_nilai_tugas);
                                        if (mysqli_num_rows($sql_cek_nilai_tugas) > 0) { ?>
                							<td><?php  echo $data_nilai_tugas['nilai']; ?></td>
                							<?php
                                        } else {
                                            echo "<td>Tugas belum dikoreksi</td>";
                                            echo "<td>Menunggu tugas dikoreksi</td>";
                                        }
                                    } else { ?>
										<td>Tidak ada tugas</td>
                					<?php
                                    } ?>
                				</tr>
                			<?php
                            }
                        } else {
                            echo '<tr><td colspan="6" align="center">Tidak ada data nilai, mungkin Anda belum mengerjakan tugas</td></tr>';
                        } ?>
                	</table>
               	</div>
            </div>
        </div>
    </div>
</div>
