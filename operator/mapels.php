<?php
include("../assets/db.php");
$kelas=$_GET['kelas'];
$ab=substr($kelas,0,1);
	echo "<option value='0'>Pilih Mapel</option>";
	$sql2 = "select * from mapel";