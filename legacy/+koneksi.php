<?php
$config = array();
$config_file = __DIR__ . '/config.php';

if (file_exists($config_file)) {
	$loaded_config = include $config_file;
	if (is_array($loaded_config)) {
		$config = $loaded_config;
	}
}

$db_host = isset($config['db_host']) ? $config['db_host'] : getenv('DB_HOST');
$db_user = isset($config['db_user']) ? $config['db_user'] : (getenv('DB_USERNAME') ?: getenv('DB_USER'));
$db_pass = array_key_exists('db_pass', $config) ? $config['db_pass'] : (getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : getenv('DB_PASS'));
$db_name = isset($config['db_name']) ? $config['db_name'] : getenv('DB_NAME');

$db_host = $db_host ? $db_host : 'localhost';
$db_user = $db_user ? $db_user : 'root';
$db_pass = $db_pass !== false ? $db_pass : '';
$db_name = $db_name ? $db_name : 'elearning';

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$db) {
	die('Database connection failed: ' . mysqli_connect_error());
}

//---fungsi2---//
function cek_session($isi_admin, $isi_pengajar) {
    if(@$_SESSION['admin']) {
        echo $isi_admin;
    } else if(@$_SESSION['pengajar']) {
        echo $isi_pengajar;
    }
}

function tgl_indo($tgl) {
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;
}
function getBulan($bln){
	switch ($bln){
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}

function tampil_per_ID($table, $where = null) {
	global $db;
	$command = "SELECT * FROM $table";
	if($where != null) {
		$command .= " WHERE $where";
	}
	$query = mysqli_query($db, $command) or die ($db->error);
	return $query;
	mysqli_close($db);
}
?>
