<?php include 'header.php'; ?>
<div class="container mt-5 table-dark">		
	<h1><center>Data Calon Mahasiswa</center></h1>
	<?php 
	include 'koneksi.php';
	$no = 1; ?>

	<table class='table'>
		<thead>
			<tr>
				<th scope='col'>No</th>
				<th scope='col'>Nama</th>
				<th scope='col'>No Pendaftaran</th>				
				<th scope='col'>Penghasilan Ortu</th>				
				<th scope='col'>Status Rumah</th>				
				<th scope='col'>Keadaan Ortu</th>				
				<th scope='col'>Jumlah Tanggungan</th>
				<th scope='col'>Pemakaian Listrik</th>			
				<th scope='col'>Sumber Air</th>			
				<th scope='col'>Status Keluarga</th>			
			</tr>
		</thead>
		<tbody>
			<?php

			$costbenefitview = array("","","cost","benefit","benefit","benefit","benefit","benefit","benefit");
			$costbenefit = array(0,0,-1,1,1,1,1,1,1);
			/*BOBOT=[Nama|No Pendaftaran|Penghasilan Ortu|Status Rumah|Keadaan Ortu|Jumlah Tanggungan|Pemakaian Listrik|Sumber Air|Status Keluarga]*/
			$bobot=array(0,0,0.13,0.04,0.48,0.13,0.04,0.04,0.13);
			$data = mysqli_query($koneksi,"select * from mahasiswa");
			$numrow = mysqli_num_rows($data);
			$data_awal = new SplFixedArray($numrow);

			while($d = mysqli_fetch_array($data)){
				$index = $no-1;
				$data_awal[$index]= new SplFixedArray(9);

				?>
				<tr>			
					<td><?php echo $no++; ?></td>

					<td><?php echo $d['nama_mahasiswa']; ?></td>
					<?php $data_awal[$index][0]=$d['nama_mahasiswa']; ?>

					<td><?php echo $d['no_pendaftaran']; ?></td>
					<?php $data_awal[$index][1]=$d['no_pendaftaran']; ?>

					<th><?php echo $d['penghasilan_ot']; ?></th>
					<?php $data_awal[$index][2]=$d['penghasilan_ot']; ?>

					<th><?php echo $d['status_rumah']; ?></th>	
					<?php $data_awal[$index][3]=$d['status_rumah']; ?>

					<th><?php echo $d['keadaan_ot']; ?></th>
					<?php $data_awal[$index][4]=$d['keadaan_ot']; ?>

					<th><?php echo $d['jumlah_tanggungan']; ?></th>
					<?php $data_awal[$index][5]=$d['jumlah_tanggungan']; ?>

					<th><?php echo $d['pemakaian_listrik']; ?></th>	
					<?php $data_awal[$index][6]=$d['pemakaian_listrik']; ?>

					<th><?php echo $d['sumber_air']; ?></th>
					<?php $data_awal[$index][7]=$d['sumber_air']; ?>

					<th><?php echo $d['status_keluarga']; ?></th>
					<?php $data_awal[$index][8]=$d['status_keluarga']; ?>
				</tr>

				<?php 
			}
			?>

			<?php 
			/*
			for ($i=0; $i < $numrow; $i++) {
				for ($j=0; $j <9; $j++){
					echo $data_awal[$i][$j];
					echo " ";
				} 
				echo "<br>"; 
			}
			*/
			?>

			<!--Normalisai -->

			<?php

			$sum_kolom = new SplFixedArray(9);
			$sum_kolom[0] = "";
			$sum_kolom[1] = "";
			for ($j=2; $j < 9; $j++){
				$sum = 0;
				for ($i = 0; $i < $numrow; $i++){
					$sum = $sum + $data_awal[$i][$j];
				}
				$sum_kolom[$j] = $sum;
				echo $sum;
				echo "  ";
			} 

			?>

			<tr>
				<td><?php echo ""; ?></td>
				<td><?php echo ""; ?></td>
				<td><?php echo "sum"; ?></td>
				<th><?php echo $sum_kolom[2]; ?></th>
				<th><?php echo $sum_kolom[3]; ?></th>				
				<th><?php echo $sum_kolom[4]; ?></th>				
				<th><?php echo $sum_kolom[5]; ?></th>
				<th><?php echo $sum_kolom[6]; ?></th>			
				<th><?php echo $sum_kolom[7]; ?></th>
				<th><?php echo $sum_kolom[8]; ?></th>
			</tr>


			<?php
			$sqrtsum = new SplFixedArray(9);
			$sqrtsum[0] = "";
			$sqrtsum[1] = ""; 
			for ($j=2; $j < 9; $j++){
				$sqrtsum[$j] = sqrt($sum_kolom[$j]);
			 	//echo $sum_kolom;
			}

			?>

			<tr>
				<td><?php echo ""; ?></td>
				<td><?php echo ""; ?></td>
				<td><?php echo "sqrt"; ?></td>
				<th><?php echo $sqrtsum[2]; ?></th>
				<th><?php echo number_format((float)$sqrtsum[3], 2, '.', ''); ?></th>				
				<th><?php echo number_format((float)$sqrtsum[4], 2, '.', ''); ?></th>				
				<th><?php echo number_format((float)$sqrtsum[5], 2, '.', ''); ?></th>				
				<th><?php echo number_format((float)$sqrtsum[6], 2, '.', ''); ?></th>				
				<th><?php echo number_format((float)$sqrtsum[7], 2, '.', ''); ?></th>				
				<th><?php echo number_format((float)$sqrtsum[8], 2, '.', ''); ?></th>
			</tr>

		</tbody><table>

		</div>
	</tbody><table>
	</div>

	<!--Hitung Matriks r-->
	<div class="container mt-5 table-dark">

		<h1><center>Normalisasi r</center></h1>
		<?php 	
		$no = 1; 
		?>

		<table class='table'>
			<thead>
				<tr>
					<th scope='col'>No</th>
					<th scope='col'>Nama</th>
					<th scope='col'>No Pendaftaran</th>				
					<th scope='col'>Penghasilan Ortu</th>				
					<th scope='col'>Status Rumah</th>				
					<th scope='col'>Keadaan Ortu</th>				
					<th scope='col'>Jumlah Tanggungan</th>
					<th scope='col'>Pemakaian Listrik</th>			
					<th scope='col'>Sumber Air</th>			
					<th scope='col'>Status Keluarga</th>			
				</tr>
			</thead>
			<tbody>

				<?php 
				$data_r = new SplFixedArray($numrow);
				$no=1;
				for ($i=0; $i < $numrow; $i++) {
					echo "<tr>";
					echo "<td>"; echo $no++; echo "</td>";
					$data_r[$i] = new SplFixedArray(9);
					$data_r[$i][0] = "";
				//echo "<td>"; echo $data_r[$i][0]; echo "</td>";
					echo "<td>"; echo $data_awal[$i][0]; echo "</td>";
					$data_r[$i][1] = "";
				//echo "<td>"; echo $data_r[$i][1]; echo "</td>";
					echo "<td>"; echo $data_awal[$i][1]; echo "</td>";
					for ($j=2; $j < 9; $j++) { 
						$data_r[$i][$j] = $data_awal[$i][$j]/$sqrtsum[$j];
						echo "<td>"; echo number_format((float)$data_r[$i][$j], 2, '.', ''); echo "</td>";
					}
					echo "</tr>";
				}


				?>
				
			</tbody><table>
			</div>

			<div class="container mt-5 table-dark">

				<h1><center>Matriks W</center></h1>
				<?php 	
				$no = 1; 
				?>

				<table class='table'>
					<thead>
						<tr>
							<th scope='col'></th>
							<th scope='col'></th>
							<th scope='col'></th>				
							<th scope='col'>Penghasilan Ortu</th>				
							<th scope='col'>Status Rumah</th>				
							<th scope='col'>Keadaan Ortu</th>				
							<th scope='col'>Jumlah Tanggungan</th>
							<th scope='col'>Pemakaian Listrik</th>			
							<th scope='col'>Sumber Air</th>			
							<th scope='col'>Status Keluarga</th>			
						</tr>
					</thead>
					<tbody>

						<tr>
							<td><?php echo ""; ?></td>
							<td><?php echo ""; ?></td>
							<td><?php echo "BOBOT"; ?></td>
							<th><?php echo $bobot[2]; ?></th>
							<th><?php echo $bobot[3]; ?></th>
							<th><?php echo $bobot[4]; ?></th>
							<th><?php echo $bobot[5]; ?></th>
							<th><?php echo $bobot[6]; ?></th>
							<th><?php echo $bobot[7]; ?></th>
							<th><?php echo $bobot[8]; ?></th>
						</tr>


					</tbody><table>
					</div>

					<!--Hitung Matriks wr-->
					<div class="container mt-5 table-dark">

						<h1><center>Matriks W*r</center></h1>
						<?php 	
						$no = 1; 
						?>

						<table class='table'>
							<thead>
								<tr>
									<th scope='col'>No</th>
									<th scope='col'>Nama</th>
									<th scope='col'>No Pendaftaran</th>				
									<th scope='col'>Penghasilan Ortu</th>				
									<th scope='col'>Status Rumah</th>				
									<th scope='col'>Keadaan Ortu</th>				
									<th scope='col'>Jumlah Tanggungan</th>
									<th scope='col'>Pemakaian Listrik</th>			
									<th scope='col'>Sumber Air</th>			
									<th scope='col'>Status Keluarga</th>			
								</tr>
							</thead>
							<tbody>

								<?php 
								$data_wr = new SplFixedArray($numrow);
								$MIN = -99999;
								$MAX = 99999;
								$array_min=array(0,0,$MAX,$MAX,$MAX,$MAX,$MAX,$MAX,$MAX);
								$array_max=array(0,0,$MIN,$MIN,$MIN,$MIN,$MIN,$MIN,$MIN);
								$no=1;
								for ($i=0; $i < $numrow; $i++) {
									echo "<tr>";
									echo "<td>"; echo $no++; echo "</td>";
									$data_wr[$i] = new SplFixedArray(9);
									$data_wr[$i][0] = "";
									/*echo "<td>"; echo $data_wr[$i][0]; echo "</td>";*/
									echo "<td>"; echo $data_awal[$i][0]; echo "</td>";
									$data_wr[$i][1] = "";
									/*echo "<td>"; echo $data_wr[$i][1]; echo "</td>";*/
									echo "<td>"; echo $data_awal[$i][1]; echo "</td>";
									for ($j=2; $j < 9; $j++) { 
										$data_wr[$i][$j] = $bobot[$j]*$data_r[$i][$j];
										echo "<td>"; echo number_format((float)$data_wr[$i][$j], 2, '.', ''); echo "</td>";
										if($data_wr[$i][$j]<$array_min[$j]){
											$array_min[$j]=$data_wr[$i][$j];

										}
										if($data_wr[$i][$j]>$array_max[$j]){
											$array_max[$j]=$data_wr[$i][$j];

										}
									}
									echo "</tr>";
								}

								/*Min*/
								echo "<tr>";
								echo "<td>"; echo ""; echo "</td>";					
								echo "<td>"; echo ""; echo "</td>";
								echo "<td><b>"; echo "MIN"; echo "</b></td>";
								for ($j=2; $j < 9; $j++) {
									echo "<td>"; echo number_format((float)$array_min[$j], 2, '.', ''); echo "</td>";
								}
								echo "</tr>";


								/*max*/
								echo "<tr>";
								echo "<td>"; echo ""; echo "</td>";					
								echo "<td>"; echo ""; echo "</td>";
								echo "<td><b>"; echo "MAX"; echo "</b></td>";
								for ($j=2; $j < 9; $j++) {
									echo "<td>"; echo number_format((float)$array_max[$j], 2, '.', ''); echo "</td>";
								}
								echo "</tr>";
								?>

								<tr>
									<td><?php echo ""; ?></td>
									<td><?php echo ""; ?></td>
									<td><b><?php echo "Cost/Benefit"; ?></b></td>
									<td><?php echo $costbenefitview[2]; ?></td>
									<td><?php echo $costbenefitview[3]; ?></td>				
									<td><?php echo $costbenefitview[4]; ?></td>				
									<td><?php echo $costbenefitview[5]; ?></td>
									<td><?php echo $costbenefitview[6]; ?></td>			
									<td><?php echo $costbenefitview[7]; ?></td>
									<td><?php echo $costbenefitview[8]; ?></td>
								</tr>

								<?php 
								$array_Y_plus = new SplFixedArray(9);
								$array_Y_minus = new SplFixedArray(9);
								for ($j=2; $j < 9; $j++) { 
									if ($costbenefit[$j]==-1) {
										$array_Y_plus[$j]=$array_min[$j];
										$array_Y_minus[$j]=$array_max[$j];
									}else{
										$array_Y_plus[$j]=$array_max[$j];
										$array_Y_minus[$j]=$array_min[$j];
									}
								}


								?>

								<tr>
									<td><?php echo ""; ?></td>
									<td><?php echo ""; ?></td>
									<td><b><?php echo "Y Plus"; ?></b></td>
									<td><?php echo number_format((float)$array_Y_plus[2], 2, '.', ''); ?></td>
									<td><?php echo number_format((float)$array_Y_plus[3], 2, '.', ''); ?></td>			
									<td><?php echo number_format((float)$array_Y_plus[4], 2, '.', ''); ?></td>				
									<td><?php echo number_format((float)$array_Y_plus[5], 2, '.', ''); ?></td>
									<td><?php echo number_format((float)$array_Y_plus[6], 2, '.', ''); ?></td>			
									<td><?php echo number_format((float)$array_Y_plus[7], 2, '.', ''); ?></td>
									<td><?php echo number_format((float)$array_Y_plus[8], 2, '.', ''); ?></td>
								</tr>


								<tr>
									<td><?php echo ""; ?></td>
									<td><?php echo ""; ?></td>
									<td><b><?php echo "Y Minus"; ?></b></td>
									<td><?php echo number_format((float)$array_Y_minus[2], 2, '.', ''); ?></td>
									<td><?php echo number_format((float)$array_Y_minus[3], 2, '.', ''); ?></td>				
									<td><?php echo number_format((float)$array_Y_minus[4], 2, '.', ''); ?></td>				
									<td><?php echo number_format((float)$array_Y_minus[5], 2, '.', ''); ?></td>
									<td><?php echo number_format((float)$array_Y_minus[6], 2, '.', ''); ?></td>			
									<td><?php echo number_format((float)$array_Y_minus[7], 2, '.', ''); ?></td>
									<td><?php echo number_format((float)$array_Y_minus[8], 2, '.', ''); ?></td>
								</tr>

							</tbody><table>
							</div>

							<?php 
							$array_S_plus = new SplFixedArray($numrow);
							$array_S_minus = new SplFixedArray($numrow);
							$array_hasil = new SplFixedArray($numrow);

							for ($i=0; $i < $numrow; $i++) { 
								$sum_Y_plus=0;
								$sum_Y_minus=0;
								for ($j=2; $j < 9; $j++) { 
									$wr_yplus = $data_wr[$i][$j]-$array_Y_plus[$j];
									$sum_Y_plus = $sum_Y_plus+($wr_yplus*$wr_yplus);

									$wr_yminus = $data_wr[$i][$j]-$array_Y_minus[$j]; 
									$sum_Y_minus = $sum_Y_minus+($wr_yminus*$wr_yminus);
								}
								$array_S_plus[$i] = sqrt($sum_Y_plus);
								$array_S_minus[$i] = sqrt($sum_Y_minus);
								$array_hasil[$i] = $array_S_minus[$i]/($array_S_minus[$i]+$array_S_plus[$i]);
							}

							 ?>


							 <!--Menampilkas Hasil Topsis-->
	<div class="container mt-5 table-dark">

		<h1><center>Hasil TOPSIS</center></h1>
		<?php 	
		$no = 1; 
		?>

		<table class='table'>
			<thead>
				<tr>
					<th scope='col'>No</th>
					<th scope='col'>Nama</th>
					<th scope='col'>No Pendaftaran</th>				
					<th scope='col'>S+</th>				
					<th scope='col'>S-</th>				
					<th scope='col'>Hasil</th>		
				</tr>
			</thead>
			<tbody>

				<?php 
				$no=1;
				for ($i=0; $i < $numrow; $i++) {
					echo "<tr>";
					echo "<td>"; echo $no++; echo "</td>";
					echo "<td>"; echo $data_awal[$i][0]; echo "</td>";
					echo "<td>"; echo $data_awal[$i][1]; echo "</td>";
					echo "<td>"; echo number_format((float)$array_S_plus[$i], 2, '.', ''); echo "</td>";
					echo "<td>"; echo number_format((float)$array_S_minus[$i], 2, '.', ''); echo "</td>";
					echo "<td>"; echo number_format((float)$array_hasil[$i], 2, '.', ''); echo "</td>";				
					echo "</tr>";
				}


				?>
				
			</tbody><table>
			</div>


							<?php include 'footer.php'; ?>