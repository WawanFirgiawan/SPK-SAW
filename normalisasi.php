<?php 
	include 'koneksi.php';
	
	// $penghasilan_ot = mysqli_query($koneksi,"select min(penghasilan_ot) from mahasiswa");
	// $penghasilan_ot = mysqli_fetch_row($penghasilan_ot);
	// $penghasilan_ot = $penghasilan_ot['0'];

	// $status_rumah = mysqli_query($koneksi,"select max(status_rumah) from mahasiswa");
	// $status_rumah = mysqli_fetch_row($status_rumah);
	// $status_rumah = $status_rumah['0'];

	// $jumlah_tanggungan = mysqli_query($koneksi,"select max(jumlah_tanggungan) from mahasiswa");
	// $jumlah_tanggungan = mysqli_fetch_row($jumlah_tanggungan);
	// $jumlah_tanggungan = $jumlah_tanggungan['0'];

	// $keadaan_ot = mysqli_query($koneksi,"select max(keadaan_ot) from mahasiswa");
	// $keadaan_ot = mysqli_fetch_row($keadaan_ot);
	// $keadaan_ot = $keadaan_ot['0'];

	// $pemakaian_listrik = mysqli_query($koneksi,"select max(pemakaian_listrik) from mahasiswa");
	// $pemakaian_listrik = mysqli_fetch_row($pemakaian_listrik);
	// $pemakaian_listrik = $pemakaian_listrik['0'];

	// $sumber_air = mysqli_query($koneksi,"select max(sumber_air) from mahasiswa");
	// $sumber_air = mysqli_fetch_row($sumber_air);
	// $sumber_air = $sumber_air['0'];

	// $status_keluarga = mysqli_query($koneksi,"select max(status_keluarga) from mahasiswa");
	// $sumber_air = mysqli_fetch_row($sumber_air);
	// $sumber_air = $sumber_air['0'];

	$data = mysqli_query($koneksi,"select id_mahasiswa, penghasilan_ot, status_rumah, jumlah_tanggungan, keadaan_ot, pemakaian_listrik, sumber_air, status_keluarga from mahasiswa");
	

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