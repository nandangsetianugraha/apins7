<?php require_once '../../../assets/db_connect.php';$kelas=$_GET['kelas'];$tapel=$_GET['tapel'];$smt=$_GET['smt'];$ab=substr($kelas, 0, 1);$output = array('data' => array());$sql = "select * from penempatan where rombel='$kelas' and tapel='$tapel' order by nama asc";$query = $connect->query($sql);while($s=$query->fetch_assoc()) {	$idpd=$s['peserta_didik_id'];	$sql2 = "select * from siswa where peserta_didik_id='$idpd'";	$query2 = $connect->query($sql2);	$j=$query2->fetch_assoc();	$sql1 = "select * from mapel order by id_mapel asc";	$query1 = $connect->query($sql1);	$mp1= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=1" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	$mp2= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=2" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	$mp3= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=3" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	$mp4= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=4" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	$mp5= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=5" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	if($ab>3){	$mp6= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=6" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	$mp7= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=7" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	}else{		$mp6='';		$mp7='';	};	$mp8= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=8" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	$mp9= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=9" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	$mp10= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=10" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	$mp11= '		<div class="btn-group">		<a href="../cetak/cetakRekap.php?idp='.$idpd.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&mp=11" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-print"></i> Cetak</a>		</div>';	$output['data'][] = array(		$j['nama'],		$mp1,$mp2,$mp3,$mp4,$mp5,$mp6,$mp7,$mp8,$mp9,$mp10,$mp11		);};$connect->close();echo json_encode($output);