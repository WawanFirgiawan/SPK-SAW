<?php 
	include 'koneksi.php';	

	$data = mysqli_query($koneksi,"select id_mahasiswa,penghasilan_ot,status_rumah,keadaan_ot,jumlah_tanggungan,pemakaian_listrik,sumber_air from mahasiswa");
	while($d = mysqli_fetch_array($data)){

		$id_mahasiswa = $d['id_mahasiswa'];
		
		$preferensi = $d['penghasilan_ot']+$d['status_rumah']+$d['keadaan_ot']+$d['jumlah_tanggungan']+$d['pemakaian_listrik']+$d['sumber_air'];		

		mysqli_query($koneksi,"UPDATE mahasiswa SET preferensi = $preferensi WHERE id_mahasiswa = $id_mahasiswa");
	}

	header('location:preferensi.php');
?>