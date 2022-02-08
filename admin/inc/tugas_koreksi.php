<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
	    <div class="panel-heading">
	        Data Siswa yang Mengumpulkan Tugas &nbsp; <a href="?page=tugas" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>Kembali</a>
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
														<th>Tanggal Pengumpulan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
                    $sql_siswa_mengikuti_tes = mysqli_query($db, "SELECT * FROM tb_jawaban_upload JOIN tb_siswa ON tb_jawaban_upload.id_siswa = tb_siswa.id_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_tu = '$id_tu'") or die($db->error);
                    if (mysqli_num_rows($sql_siswa_mengikuti_tes) > 0) {
                        while ($data_siswa_mengikuti_tes = mysqli_fetch_array($sql_siswa_mengikuti_tes)) {
                            ?>
                            <tr>
                                <td align="center" width="40px"><?php echo $no++; ?></td>
                                <td><?php echo $data_siswa_mengikuti_tes['nama_lengkap']; ?></td>
                                <td><?php echo $data_siswa_mengikuti_tes['nama_kelas']; ?></td>
                            	<?php
                            $sql_jwb = mysqli_query($db, "SELECT * FROM tb_jawaban_upload WHERE id_siswa = '$data_siswa_mengikuti_tes[id_siswa]' AND id_tu = '$id_tu'") or die($db->error);
                            $sql_tugas = mysqli_query($db, "SELECT * FROM tb_nilai_upload WHERE id_siswa = '$data_siswa_mengikuti_tes[id_siswa]' AND id_tu = '$id_tu'") or die($db->error);
                            $data_tugas = mysqli_fetch_array($sql_tugas); ?>
                            	<td>
                            		Nilai tugas :
                            		<?php
                                    if (mysqli_num_rows($sql_jwb) > 0) {
                                        if (mysqli_num_rows($sql_tugas) > 0) {
                                            echo $data_tugas['nilai'];
                                        } else {
                                            echo "(belum dikoreksi)";
                                        }
                                    } else {
                                        echo "CBT ini tidak ada soal tugas";
                                    } ?><br />
                            	</td>
															<td>
																<?php echo $data_siswa_mengikuti_tes['tgl_mengumpulkan']; ?>
																<?php echo $data_siswa_mengikuti_tes['waktu_mengumpulkan']; ?>
															</td>
                                <td align="center" width="220px">
																	<div class="btn-group mb-3" role="group" aria-label="Basic example">
                                    <?php
                                    if (mysqli_num_rows($sql_jwb) > 0) {
                                        if (mysqli_num_rows($sql_tugas) > 0) { ?>
                                            <a href="?page=tugas&action=koreksi&hal=edittugas&id_tu=<?php echo $id_tu; ?>&id_siswa=<?php echo $data_siswa_mengikuti_tes['id_siswa']; ?>&id_nilai=<?php echo $data_tugas['id']; ?>" class="btn btn-icon icon-left btn-primary"> <i class="far fa-edit"></i>Edit Koreksi Tugas</a>
                                        <?php
                                        } else { ?>
                                            <a href="?page=tugas&action=koreksi&hal=tugas&id_tu=<?php echo $id_tu; ?>&id_siswa=<?php echo $data_siswa_mengikuti_tes['id_siswa']; ?>" class="btn btn-icon icon-left btn-secondary"><i class="fas fa-check-square"></i>Koreksi Tugas</a>
                                        <?php
                                        }
                                    } ?>
                                    <a onclick="return confirm('Yakin akan menghapus siswa ini dari daftar pengumpulan tugas?');" href="?page=tugas&action=hapuspeserta&id_tu=<?php echo $id_tu; ?>&id_siswa=<?php echo $data_siswa_mengikuti_tes['id_siswa']; ?>" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i>Hapus Data Tugas</a>
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
                    <a href="./laporan/cetak.php?data=tugas&id_tu=<?php echo $id_tu; ?>" target="_blank" class="btn btn-default btn-sm">Cetak</a>
                <?php } ?>
            </div>
        </div>
	</div>
</div>
