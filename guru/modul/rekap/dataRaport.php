<?php 
require_once '../../../assets/db_connect.php';
$tapel=$_GET['tapel'];
$kelas=$_GET['kelas'];
$mpid=$_GET['mp'];
$ab=substr($kelas, 0, 1);
$output = array('data' => array());

$sql="select * from penempatan where rombel='$kelas' and tapel='$tapel' order by nama asc";
$query = $connect->query($sql);
while($s=$query->fetch_assoc()) {
	$idp=$s['peserta_didik_id'];
	$adam41=$connect->query("select * from raport where id_pd='$idp' and kelas=4 and smt=1 and mapel='$mpid'")->num_rows;
	$adam42=$connect->query("select * from raport where id_pd='$idp' and kelas=4 and smt=2 and mapel='$mpid'")->num_rows;