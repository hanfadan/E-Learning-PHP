<?php
$sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE id_siswa = '$_SESSION[siswa]'") or die($db->error);
$data = mysqli_fetch_array($sql_siswa);
?>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Presensi Siswa</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-6">

        <form method="post" enctype="multipart/form-data">
            NIS :<input type="text" name="nis" value="<?php echo $data['nis']; ?>" class="form-control" required/>
            Nama Lengkap : <input type="text" value="<?php echo $data['nama_lengkap']; ?>" name="nama_lengkap" class="form-control" required />
            Kelas :
            <select name="kelas" class="form-control" required>
                <option value="<?php echo $data['id_kelas']; ?>"><?php echo $data['nama_kelas']; ?></option>
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
            Hasil Pembelajaran : <textarea name="hasil_pembelajaran" class="form-control" required></textarea>
            <input type="hidden" name="tgl_presensi" value="<?php date_default_timezone_set("Asia/Jakarta"); echo "".date('d/m/Y'); ?>" class="form-control" required />
            <input type="hidden" name="waktu_presensi" value="<?php date_default_timezone_set("Asia/Jakarta"); echo "".date("h:i:s"); ?>" class="form-control" required />
            <hr />
            <input type="submit" name="simpan" value="Simpan" class="btn btn-info" />
            <input type="reset" class="btn btn-danger" />
        </form>
</div>
        <?php
        if (@$_POST['simpan']) {
            $nis = @mysqli_real_escape_string($db, $_POST['nis']);
            $nama_lengkap = @mysqli_real_escape_string($db, $_POST['nama_lengkap']);
            $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
            $mapel = @mysqli_real_escape_string($db, $_POST['mapel']);
            $tgl_presensi = @mysqli_real_escape_string($db, $_POST['tgl_presensi']);
            $waktu_presensi = @mysqli_real_escape_string($db, $_POST['waktu_presensi']);
            $hasil_pembelajaran = @mysqli_real_escape_string($db, $_POST['hasil_pembelajaran']);
            mysqli_query($db, "INSERT INTO tb_presensi VALUES( '', '$nis', '$nama_lengkap', '$kelas', '$mapel', '$tgl_presensi', '$waktu_presensi', '$hasil_pembelajaran' )") or die($db->error);
            echo '<script>alert("Presensi berhasil, Terimakasih"); window.location="?page=presensi"</script>';
        }
        ?>
