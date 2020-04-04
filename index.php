<?php include 'header.php'; ?>
<div class="container my-5">
	<h1 class="text-center"><a class="btn btn-danger" href="preferensi.php">METODE SAW</a></h1>
	<h1 class="text-center"><a class="btn btn-danger" href="preferensi_topsis.php">METODE TOPSIS</a></h1>
	<h1 class="text-center"><a class="btn btn-danger" href="preferensi_saw_ahp.php">METODE SAW-AHP</a></h1>
	<h1 class="text-center"><a class="btn btn-danger" href="preferensi_topsis_ahp.php">METODE TOPSIS-AHP</a></h1>
	<form action="proses.php" method="post">

		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">NAMA</label>
			<div class="col-sm-10">
				<input type="text" name="nama_mahasiswa" class="form-control" placeholder="Isi Nama disini">
			</div>
		</div>

		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">No Pendaftaran</label>
			<div class="col-sm-10">
				<input type="text" name="nim" class="form-control" placeholder="Isi Nomor Pendaftaran">
			</div>
		</div>

		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Nomor Handphone</label>
			<div class="col-sm-10">
				<input type="text" name="hp" class="form-control" placeholder="Isi No HP disini">
			</div>
		</div>

		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-10">
				<textarea name="alamat" class="form-control"placeholder="Silakah ketik alamat di sini"></textarea>
			</div>
		</div>
		<!-- kriteria -->
		<div class="form-group row">
			<label for="penghasilan_ot" class="col-sm-2 col-form-label">STATUS KELUARGA</label>
			<div class="col-sm-10">
				<select name="status_keluarga" class="form-control">
					<option value="10">Memiliki Bantuan Pemerintah</option>
					<option value="5">Tidak Memiliki Bantuan Pemerintah</option>
					<option value="0">Sejahtera</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="status_rumah" class="col-sm-2 col-form-label">STATUS RUMAH</label>
			<div class="col-sm-10">
				<select name="status_rumah" class="form-control">
					<option value="10">Rumah Sewa/Kontrakan</option>
					<option value="9">Rumah Keluarga</option>
					<option value="8">Darurat</option>
					<option value="5">Semi Permanen</option>
					<option value="1">Permanen</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="keadaan_ot" class="col-sm-2 col-form-label">KEADAAN ORANG TUA</label>
			<div class="col-sm-10">
				<select name="keadaan_ot" class="form-control">
					<option value="25">Ayah dan Ibu Meninggal</option>
					<option value="15">Ayah Meniggal</option>
					<option value="10">Ibu Meninggal</option>
					<option value="7">Tinggal Dengan Ibu/Keluarga</option>
					<option value="5">Tinggal Dengan Ayah</option>
					<option value="1">Ayah dan Ibu Tinggal Bersama</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="penghasilan_ot" class="col-sm-2 col-form-label">PENGHASILAN ORANG TUA</label>
			<div class="col-sm-10">
				<select name="penghasilan_ot" class="form-control">
					<option value="10">< Rp 1Jt</option>
					<option value="6">Rp 1jt - Rp 2.5jt </option>
					<option value="3">> Rp2.5jt - 4jt</option>
					<option value="1">> 4jt</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="jumlah_tanggungan" class="col-sm-2 col-form-label">JUMLAH TANGGUNGAN ORANG TUA</label>
			<div class="col-sm-10">
				<select name="jumlah_tanggungan" class="form-control">
					<option value="10">> 4 Orang</option>
					<option value="7">3-4 orang</option>
					<option value="3">1-2 orang</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="pemakaian_listrik" class="col-sm-2 col-form-label">PEMAKAIAN LISTRIK</label>
			<div class="col-sm-10">
				<select name="pemakaian_listrik" class="form-control">
					<option value="10">Tidak Memiliki Listrik</option>
					<option value="8">Listrik non PLN</option>
					<option value="5">Listrik Daya 450 - 900 Watt</option>
					<option value="2">Listrik 1.300 Watt keatas</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="sumber_air" class="col-sm-2 col-form-label">SUMBER AIR</label>
			<div class="col-sm-10">
				<select name="sumber_air" class="form-control">
					<option value="10">lainnya</option>
					<option value="8">Sumur Bersama</option>
					<option value="6">Sumur Sendiri</option>
					<option value="4">PDAM</option>
				</select>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>			
	</form>	
</div>
<div class="container mt-5 table-dark">
	

	<?php 
	include 'koneksi.php';
	$no = 1; ?>

	<table class='table'>
		<thead>
			<tr>
				<th scope='col'>No</th>
				<th scope='col'>Nama</th>
				<th scope='col'>No Pendaftaran</th>				
				<th class="text-center" scope='col'>AKSI</th>				
			</tr>
		</thead>
		<tbody>
			<?php
			$data = mysqli_query($koneksi,"select * from mahasiswa");
			while($d = mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama_mahasiswa']; ?></td>
					<td><?php echo $d['no_pendaftaran']; ?></td>		
					<td class="text-center">
						<a class="btn btn-danger" href="hapus.php?id=<?php echo $d['id_mahasiswa']; ?>">HAPUS</a>
					</td>
				</tr>
			</tbody>
			<?php 
		}
		echo "</tbody><table>";
		?>
	</div>

	<?php include 'footer.php'; ?>