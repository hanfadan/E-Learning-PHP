<?php
$sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$_SESSION[pengajar]'") or die($db->error);
$data = mysqli_fetch_array($sql_pengajar);
?>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Jurnal Harian Pengajar</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-6">

        <form method="post" enctype="multipart/form-data">
            NIP :<input type="text" name="nip" value="<?php echo $data['nip']; ?>" class="form-control" required/>
            Nama Lengkap : <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" required />
            Kelas :
            <select name="kelas" class="form-control" required>
                <option value="">- Pilih -</option>
                <?php
                $sql_kelas = mysqli_query($db, "SELECT * from tb_kelas") or die($db->error);
                while ($data_kelas = mysqli_fetch_array($sql_kelas)) {
                    echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
                } ?>
            </select>
            Mapel :
            <select name="mapel" class="form-control" required>
                <option value="">- Pilih -</option>
                <?php
                $sql_mapel = mysqli_query($db, "SELECT * from tb_mapel") or die($db->error);
                while ($data_mapel = mysqli_fetch_array($sql_mapel)) {
                    echo '<option value="'.$data_mapel['id'].'">'.$data_mapel['mapel'].'</option>';
                } ?>
            </select>
            Uraian Kegiatan : <textarea name="uraian_kegiatan" class="form-control" required></textarea>
            <input type="hidden" name="tgl_jurnal" value="<?php date_default_timezone_set("Asia/Jakarta"); echo "".date('d/m/Y'); ?>" class="form-control" required />
            <input type="hidden" name="waktu_jurnal" value="<?php date_default_timezone_set("Asia/Jakarta"); echo "".date("h:i:s"); ?>" class="form-control" required />
            <hr />
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info" />
            <input type="reset" class="btn btn-danger" />
        </form>
        <?php
        if (@$_POST['simpan']) {
            $nip = @mysqli_real_escape_string($db, $_POST['nip']);
            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
            $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
            $mapel = @mysqli_real_escape_string($db, $_POST['mapel']);
            $tgl_jurnal = @mysqli_real_escape_string($db, $_POST['tgl_jurnal']);
            $waktu_jurnal = @mysqli_real_escape_string($db, $_POST['waktu_jurnal']);
            $uraian_kegiatan = @mysqli_real_escape_string($db, $_POST['uraian_kegiatan']);
            mysqli_query($db, "INSERT INTO tb_jurnal_harian VALUES( '', '$nip', '$nama_lengkap', '$kelas', '$mapel', '$tgl_jurnal', '$waktu_jurnal', '$uraian_kegiatan' )") or die($db->error);
            echo '<script>alert("Pengisian Jurnal berhasil, Terimakasih"); window.location="?page=jurnal"</script>';
        }
        ?>
