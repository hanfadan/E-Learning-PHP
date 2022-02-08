<html>
<head>
	<title>Import Excel Ke MySQL dengan PHP - www.malasngoding.com</title>
</head>
<body>
<h2>Import Soal Tugas</h2>
<h3>www.malasngoding.com</h3>

<a href="index.php">Kembali</a> <a href="./admin/file_materi/<?php echo $data_materi['nama_file']; ?>" id="klik" isi="<?php echo $data_materi['id_materi']; ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-download"></i>Download</a>
<br/><br/>

<form method="post" enctype="multipart/form-data" action="upload_aksi.php">
	Pilih File:
	<input name="filepegawai" type="file" required="required">
	<input name="upload" type="submit" value="Import">
</form>

<br/><br/>

<a href="https://www.malasngoding.com/import-excel-ke-mysql-dengan-php">www.malasngoding.com</a>

</body>
