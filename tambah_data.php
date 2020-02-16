<?php
	include 'koneksi.php';
	
	$provinsi=$_POST['provinsi'];
	$kabupaten=$_POST['kabupaten'];	
	$kecamatan=$_POST['kecamatan'];	
	$kelurahan=$_POST['kelurahan'];	
	$tps=$_POST['tps'];
	$urut_satu=$_POST['urut_satu'];
	$urut_dua=$_POST['urut_dua'];
	
	$simpan = mysql_query("INSERT INTO simpan (provinsi, kabupaten, kecamatan, kelurahan, tps, urut_satu, urut_dua) 
		VALUES ( '$provinsi','$kabupaten','$kecamatan','$kelurahan','$tps','$urut_satu','$urut_dua')");
	if ($simpan){
		echo "<script>alert('Data BERHASIL di Simpan!');window.location='index.php';</script>";
	}else{
		echo "<script>alert('Data GAGAL di Simpan!');window.location='index.php';</script>";
	}
?>