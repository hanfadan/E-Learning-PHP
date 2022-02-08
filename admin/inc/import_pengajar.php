<?php
		global $mysqli;
			$host="localhost";
			$user="root";
			$pass="";
			$database="alhrfcju_db_elearning";
			$mysqli=new mysqli($host,$user,$pass,$database);
			if (mysqli_connect_errno()) {
			trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR);
        }
		if(isset($_POST['submit'])){

			// Jika user mengklik tombol Import
			$nama_file_baru = 'data.xlsx';

			// Load librari PHPExcel nya
			require_once '../PHPExcel-1.8/Classes/PHPExcel.php';
			require_once '../PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';

			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load($nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

			$numrow = 1;
			foreach($sheet as $row){
				// Ambil data pada excel sesuai Kolom
        $nip = $row['A'];
        $nama_lengkap = $row['B'];
        $tempat_lahir = $row['C'];
        $tgl_lahir = $row['D'];
        $jenis_kelamin = $row['E'];
        $agama = $row['F'];
        $no_telp = $row['G'];
        $email = $row['H'];
        $alamat = $row['I'];
        $jabatan = $row['J'];
        $nama_gambar = $row['K'];
        $web = $row['L'];
        $username = $row['M'];
        $password = $row['N'];
        $pass = $row['O'];
        $status = $row['P'];


					// Cek jika semua data tidak diisi
          if($nip == "" && $nama_lengkap == "" && $tempat_lahir == "" && $tgl_lahir  == "" && $jenis_kelamin  == "" && $agama  == "" && $no_telp  == "" && $email  == "" && $alamat  == "" && $jabatan
          == "" && $nama_gambar  == "" && $web  == "" && $username  == "" && $password  == "" && $pass  == "")
						continue;

				if($numrow > 1){
					// Buat query Insert
					$mysqli->query( "INSERT INTO tb_pengajar
					   VALUES('', '$nip', '$nama_lengkap', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$no_telp', '$email', '$alamat', '$jabatan', 'anonim.png', '$web', '$username', md5('$password'), '$password', 'aktif')") or die($db->error);
}
				$numrow++;
			}
		}?>
  <script>alert('Import Data Success')</script>";
  <script type='text/javascript'> document.location = '\../../index.php'; </script>";
