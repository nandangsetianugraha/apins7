<?php 

require_once '../../../assets/db_connect.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$namasekolah=$_POST['nama_sekolah'];
	$alamatsekolah=$_POST['alamat_sekolah'];
	$versi=$_POST['versi'];
		$sql = "UPDATE konfigurasi SET tapel='$tapel', semester='$smt', nama_sekolah='$namasekolah', alamat_sekolah='$alamatsekolah', versi='$versi' WHERE id_conf='1'";
	if($query === TRUE) {			
	
	// close the database connection
	$connect->close();

	echo json_encode($validator);

}