<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        Data Siswa yang Mengikuti CBT &nbsp; <a href="?page=quiz" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
	    </div>
	    <div class="panel-body">
            <div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status Hasil</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
                    $sql_siswa_mengikuti_tes = mysqli_query($db, "SELECT * FROM tb_nilai_pilgan JOIN tb_siswa ON tb_nilai_pilgan.id_siswa = tb_siswa.id_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_tc = '$id_tc'") or die($db->error);
                    if (mysqli_num_rows($sql_siswa_mengikuti_tes) > 0) {
                        while ($data_siswa_mengikuti_tes = mysqli_fetch_array($sql_siswa_mengikuti_tes)) {
                            ?>
                            <tr>
                                <td align="center" width="40px"><?php echo $no++; ?></td>
                                <td><?php echo $data_siswa_mengikuti_tes['nama_lengkap']; ?></td>
                                <td><?php echo $data_siswa_mengikuti_tes['nama_kelas']; ?></td>
                            	<?php
                                $sql_pilgan = mysqli_query($db, "SELECT * FROM tb_nilai_pilgan WHERE id_siswa = '$data_siswa_mengikuti_tes[id_siswa]' AND id_tc = '$id_tc'") or die($db->error);
                            $data_pilgan = mysqli_fetch_array($sql_pilgan);
                            $sql_jwb = mysqli_query($db, "SELECT * FROM tb_jawaban WHERE id_siswa = '$data_siswa_mengikuti_tes[id_siswa]' AND id_tc = '$id_tc'") or die($db->error);
                            $sql_essay = mysqli_query($db, "SELECT * FROM tb_nilai_essay WHERE id_siswa = '$data_siswa_mengikuti_tes[id_siswa]' AND id_tc = '$id_tc'") or die($db->error);
                            $data_essay = mysqli_fetch_array($sql_essay); ?>
                            	<td>
                            		Nilai soal pilihan ganda : <?php echo $data_pilgan['presentase']; ?><br />
                            		Nilai soal essay :
                            		<?php
                                    if (mysqli_num_rows($sql_jwb) > 0) {
                                        if (mysqli_num_rows($sql_essay) > 0) {
                                            echo $data_essay['nilai'];
                                        } else {
                                            echo "(belum dikoreksi)";
                                        }
                                    } else {
                                        echo "CBT ini tidak ada soal essay";
                                    } ?><br />
																Nilai Total :
																<?php echo($data_pilgan['presentase']+$data_essay['nilai'])/2; ?>
                            	</td>
                                <td align="center" width="220px">
																	<div class="btn-group mb-3" role="group" aria-label="Basic example">
                                    <?php
                                    if (mysqli_num_rows($sql_jwb) > 0) {
                                        if (mysqli_num_rows($sql_essay) > 0) { ?>
                                            <a href="?page=quiz&action=koreksi&hal=editessay&id_tc=<?php echo $id_tc; ?>&id_siswa=<?php echo $data_siswa_mengikuti_tes['id_siswa']; ?>&id_nilai=<?php echo $data_essay['id']; ?>" class="btn btn-icon icon-left btn-primary"> <i class="far fa-edit"></i>Edit Koreksi Essay</a>
                                        <?php
                                        } else { ?>
                                            <a href="?page=quiz&action=koreksi&hal=essay&id_tc=<?php echo $id_tc; ?>&id_siswa=<?php echo $data_siswa_mengikuti_tes['id_siswa']; ?>" class="btn btn-icon icon-left btn-secondary"><i class="fas fa-check-square"></i>Koreksi Essay</a>
                                        <?php
                                        }
                                    } ?>
                                    <a onclick="return confirm('Yakin akan menghapus siswa ini dari daftar peserta ujian?');" href="?page=quiz&action=hapuspeserta&id_tc=<?php echo $id_tc; ?>&id_siswa=<?php echo $data_siswa_mengikuti_tes['id_siswa']; ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i>Hapus Peserta CBT</a>
																	</div>
																</td>
                            </tr>
    					<?php
                        }
                    } else {
                        echo '<tr><td colspan="5" align="center">Data tidak ditemukan</td></tr>';
                    } ?>
                    </tbody>
                </table>
                <?php if (mysqli_num_rows($sql_siswa_mengikuti_tes) > 0) { ?>
                    <a href="./laporan/cetak.php?data=quiz&id_tc=<?php echo $id_tc; ?>" target="_blank" class="btn btn-default btn-sm">Cetak</a>
                <?php } ?>
            </div>
        </div>
	</div>
</div>
