<?php 
//if form is submitted
if($_POST) {	
	$validator = array('success' => false, 'messages' => array());
	$tempat=strip_tags($connect->real_escape_string($_POST['tempat']));
	$id_pd1=random(8);
		$validator['success'] = false;
		$validator['messages'] = "Nama dan tanggal lahir tidak boleh kosong!";
	}else{