<?php require_once '../../../assets/db_connect.php';$dayList = array(		'Sun' => 'Minggu',		'Mon' => 'Senin',		'Tue' => 'Selasa',		'Wed' => 'Rabu',		'Thu' => 'Kamis',		'Fri' => 'Jumat',		'Sat' => 'Sabtu'	);$kelas=$_GET['kelas'];$tanggal=$_GET['tgl'];$tapel=$_GET['tapel'];$thn = substr($tanggal, 6, 4);$bln = substr($tanggal, 0, 2);$tgl   = substr($tanggal, 3, 2);$tgls=$thn."-".$bln."-".$tgl;$day = date('D', strtotime($tgls));$output = array('data' => array());//$sql = "select penempatan.*, absensi.* from penempatan join absensi using(peserta_didik_id) where absensi.tanggal='$tgls' and penempatan.rombel='$kelas' and penempatan.tapel='$tapel'";$sql = "select * from penempatan where rombel='$kelas' and tapel='$tapel'";$query = $connect->query($sql);while($s=$query->fetch_assoc()) {	$idp=$s['peserta_didik_id'];	$sql1 = "select * from siswa where peserta_didik_id='$idp'";	$query1 = $connect->query($sql1);	$m=$query1->fetch_assoc();	$cekabsen=$connect->query("select * from absensi where tanggal='$tgls' and peserta_didik_id='$idp'")->num_rows;	if($cekabsen>0){		$absennya=$connect->query("select * from absensi where tanggal='$tgls' and peserta_didik_id='$idp'")->fetch_assoc();		$actionButton = '		<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#removeAbsenModal" onclick="removeAbsen('.$absennya['id_absen'].')"> <i class="fa fa-trash"></i></button>		';		$tombol = $absennya['absensi'];	}else{		$actionButton='';		$tombol = '		<div class="btn-group">		<a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahAbsen" data-kelas="'.$kelas.'" data-tgls="'.$tgls.'" data-tapel="'.$tapel.'" data-pdid="'.$idp.'" id="getEkskul"><i class="fa fa-plus-circle"></i></a>		</div>';	};	$output['data'][] = array(		$m['nama'],		$tombol,		$actionButton	);};$connect->close();echo json_encode($output);