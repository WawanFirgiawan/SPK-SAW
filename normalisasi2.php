<?php 
	include 'koneksi.php';
	
	$ipk = mysqli_query($koneksi,"select max(ipk) from mahasiswa");
	$ipk = mysqli_fetch_row($ipk);
	$ipk = $ipk['0'];

	$penghasilan_ot = mysqli_query($koneksi,"select min(penghasilan_ot) from mahasiswa");
	$penghasilan_ot = mysqli_fetch_row($penghasilan_ot);
	$penghasilan_ot = $penghasilan_ot['0'];

	$tanggungan_ot = mysqli_query($koneksi,"select max(tanggungan_ot) from mahasiswa");
	$tanggungan_ot = mysqli_fetch_row($tanggungan_ot);
	$tanggungan_ot = $tanggungan_ot['0'];

	$exkul = mysqli_query($koneksi,"select max(exkul) from mahasiswa");
	$exkul = mysqli_fetch_row($exkul);
	$exkul = $exkul['0'];

	$data = mysqli_query($koneksi,"select id_mahasiswa,ipk,penghasilan_ot,tanggungan_ot,exkul from mahasiswa");
	

	while($d = mysqli_fetch_array($data)){
	 	$ipk_normalisasi = ($d['ipk']/$ipk)*0.4;
		
		$penghasilan_ot_normalisasi= ($penghasilan_ot/$d['penghasilan_ot'])*0.25;
		
		$tanggungan_ot_normalisasi = ($d['tanggungan_ot']/$tanggungan_ot)*0.2;
		
		$exkul_normalisasi=($d['exkul']/$exkul)*0.15;

		$id_mahasiswa = $d['id_mahasiswa'];
		
		$preferensi = $ipk_normalisasi+$penghasilan_ot_normalisasi+$tanggungan_ot_normalisasi+$exkul_normalisasi;		

		mysqli_query($koneksi,"UPDATE mahasiswa SET preferensi = $preferensi WHERE id_mahasiswa = $id_mahasiswa");

	}

	header('location:preferensi.php');
?>