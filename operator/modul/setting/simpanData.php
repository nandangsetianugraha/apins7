<?php 

require_once '../../../assets/db_connect.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$namasekolah=$_POST['nama_sekolah'];
	$alamatsekolah=$_POST['alamat_sekolah'];
	$versi=$_POST['versi'];	$smt=$_POST['smt'];	$tapel=$_POST['tapel'];
		$sql = "UPDATE konfigurasi SET tapel='$tapel', semester='$smt', nama_sekolah='$namasekolah', alamat_sekolah='$alamatsekolah', versi='$versi' WHERE id_conf='1'";		$query = $connect->query($sql);
	if($query === TRUE) {						$validator['success'] = true;			$validator['messages'] = "Konfigurasi berhasil diubah!";				} else {					$validator['success'] = false;			$validator['messages'] = "Error while adding the member information";		};
	
	// close the database connection
	$connect->close();

	echo json_encode($validator);

}