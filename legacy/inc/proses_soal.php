<?php
@session_start();
include "../+koneksi.php";

$id_tc = mysqli_real_escape_string($db, $_POST['id_tc']);

$soal = mysqli_query($db, "SELECT * FROM tb_soal_pilgan where id_tc = '$id_tc'") or die ($db->error);
$pilganda = mysqli_num_rows($soal);

$soal_esay = mysqli_query($db, "SELECT * FROM tb_soal_essay WHERE id_tc = '$id_tc'") or die ($db->error);
$esay = mysqli_num_rows($soal_esay);

if (!empty($pilganda) AND !empty($esay)) {

  if(!empty($_POST['soal_pilgan'])) {
      $benar = 0;
      $salah = 0;
      foreach($_POST['soal_pilgan'] as $key => $value){
        $cek = mysqli_query($db, "SELECT * FROM tb_soal_pilgan WHERE id_pilgan = '$key'") or die ($db->error);
        while($c = mysqli_fetch_array($cek)){
            $jawaban = $c['kunci'];
        }
        if($value == $jawaban) {
            $benar++;
        } else {
            $salah++;
        }
    }
    $jumlah = $_POST['jumlahsoalpilgan'];
    $tidakjawab = $jumlah - $benar - $salah;
    $persen = $benar / $jumlah;
    $hasil = $persen * 100;
    mysqli_query($db, "INSERT INTO tb_nilai_pilgan VALUES ('', '$id_tc', '$_SESSION[siswa]', '$benar', '$salah', '$tidakjawab', '$hasil')") or die ($db->error);
  } else if(empty($_POST['soal_pilganda'])){
      $jumlah = $_POST['jumlahsoalpilgan'];
      mysqli_query($db, "INSERT INTO tb_nilai_pilgan VALUES ('', '$id_tc', '$_SESSION[siswa]', '0', '0', '$jumlah', '0')") or die ($db->error);
  }

  if(!empty($_POST['soal_essay'])) {
      foreach($_POST['soal_essay'] as $key2 => $value) {
        $jawaban = $value;
        $cek = mysqli_query($db, "SELECT * FROM tb_soal_essay WHERE id_essay = '$key2'");
        while($data = mysqli_fetch_array($cek)) {
            mysqli_query($db, "INSERT INTO tb_jawaban VALUES('', '$id_tc','$data[id_essay]','$_SESSION[siswa]','$jawaban')") or die ($db->error);
        }
      }
  } else if (empty($_POST['soal_esay'])){
      mysqli_query($db, "INSERT INTO tb_jawaban VALUES('', '$id_tc','$data[id_essay]','$_SESSION[siswa]','')") or die ($db->error);
  }
  echo "<script>window.location='./../?page=quiz&action=infokerjakan&id_tc=".$id_tc."';</script>";
}

///////////

if (empty($pilganda) AND !empty($esay)) {
  if(!empty($_POST['soal_essay'])) {
    foreach($_POST['soal_essay'] as $key2 => $value){
      $jawaban = $value;
      $cek = mysqli_query($db, "SELECT * FROM tb_soal_essay WHERE id_essay = '$key2'");
      while($data = mysqli_fetch_array($cek)) {
          mysqli_query($db, "INSERT INTO tb_jawaban VALUES('', '$id_tc', '$data[id_essay]', '$_SESSION[siswa]', '$jawaban')") or die ($db->error);
      }
    }
  } else if(empty($_POST['soal_essay'])) {
    mysqli_query($db, "INSERT INTO tb_jawaban VALUES('', '$id_tc', '$data[id_essay]', '$_SESSION[siswa]','')") or die ($db->error);
  }
  echo "<script>window.location='./../?page=quiz&action=infokerjakan&id_tc=".$id_tc."';</script>";
}

if (!empty($pilganda) AND empty($esay)) {
  if(!empty($_POST['soal_pilgan'])) {
      $benar = 0;
      $salah = 0;
      foreach($_POST['soal_pilgan'] as $key => $value) {
          $cek = mysqli_query($db, "SELECT * FROM tb_soal_pilgan WHERE id_pilgan = '$key'") or die ($db->error);
          while($c = mysqli_fetch_array($cek)) {
              $jawaban = $c['kunci'];
          }
          if($value == $jawaban) {
              $benar++;
          } else {
              $salah++;
          }
      }
      $jumlah = $_POST['jumlahsoalpilgan'];
      $tidakjawab = $jumlah - $benar - $salah;
      $persen = $benar / $jumlah;
      $hasil = $persen * 100;
      mysqli_query($db, "INSERT INTO tb_nilai_pilgan VALUES('', '$id_tc', '$_SESSION[siswa]', '$benar', '$salah', '$tidakjawab', '$hasil')") or die ($db->error);

  } else if(empty($_POST['soal_pilgan'])) {
      $jumlah = $_POST['jumlahsoalpilgan'];
      mysqli_query($db, "INSERT INTO tb_nilai_pilgan VALUES('', '$id_tc', '$_SESSION[siswa]', '0', '0', '$jumlah', '0')") or die ($db->error);
  }
  echo "<script>window.location='./../?page=quiz&action=infokerjakan&id_tc=".$id_tc."';</script>";
} ?>
