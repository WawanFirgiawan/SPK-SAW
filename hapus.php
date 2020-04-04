<?php 
	include 'koneksi.php';
	$id = $_GET['id'];
	$hapus = mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE id_mahasiswa ='$id' ");

	header('location:index.php');
?>