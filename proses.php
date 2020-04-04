<?php 

	$nama_mahasiswa    = $_POST['nama_mahasiswa'];
	$nim               = $_POST['nim'];
	$alamat            = $_POST['alamat'];
	$hp                = $_POST['hp'];
	$status_keluarga   = $_POST['status_keluarga'];
	$penghasilan_ot    = $_POST['penghasilan_ot'];
	$status_rumah      = $_POST['status_rumah'];
	$keadaan_ot        = $_POST['keadaan_ot'];	
	$jumlah_tanggungan = $_POST['jumlah_tanggungan'];
	$pemakaian_listrik = $_POST['pemakaian_listrik'];
	$sumber_air        = $_POST['sumber_air'];

	
	include 'koneksi.php';

	$cek = mysqli_query($koneksi,"INSERT INTO mahasiswa values('','$nama_mahasiswa','$nim','$alamat','$hp','$penghasilan_ot','$status_rumah','$keadaan_ot','$jumlah_tanggungan','$pemakaian_listrik','$sumber_air','null','$status_keluarga')");
	
	if($cek){
		header('location:index.php');		
	}else{
		die("Connection failed: " . mysqli_connect_error());
	}
?>