<?php
include "../../+koneksi.php";
    $judul = @mysqli_real_escape_string($db, $_POST['judul']);
    $kelas = @mysqli_real_escape_string($db, $_POST['kelas']);
    $isi = @mysqli_real_escape_string($db, $_POST['isi']);
    $status = @mysqli_real_escape_string($db, $_POST['status']);
    if (@$_SESSION[admin]) {
        mysqli_query($db, "INSERT INTO tb_pengumuman VALUES('', '$judul', '$kelas', '$isi', now(), 'admin', '$status')") or die($db->error);
    } elseif (@$_SESSION[pengajar]) {
        mysqli_query($db, "INSERT INTO tb_pengumuman VALUES('', '$judul', '$kelas', '$isi', now(), '$_SESSION[pengajar]', '$status')") or die($db->error);
    }
    echo '<script>window.location="?page=pengumuman";</script>';
 ?>
