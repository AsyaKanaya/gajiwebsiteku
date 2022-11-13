<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>

	<center>
		<h1>POLITAMA</h1>
		<h2>Slip Gaji Pegawai</h2>
		<hr style="width: 50%; border-width: 5px; color: black;">
	</center>

	<?php
	
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');

		?>

		<?php foreach($potongan as $p) {
		$potongan=$p->jml_potongan;
	} ?>


	<?php foreach($print_slip as $ps) : ?>

	<?php $potongan_gaji=$ps->alpha * $potongan; ?>

	<table style="width: 100px%">
		<tr>
			<th width= "20%">Nama Pegawai</th>
			<td>:</td>
			<td><?php echo $ps->nama_pegawai ?></td>
		</tr>
		<tr>
			<th>NIK</th>
			<td>:</td>
			<td><?php echo $ps->nik ?></td>
		</tr>
		<tr>
			<th>Jabatan</th>
			<td>:</td>
			<td><?php echo $ps->nama_jabatan ?></td>
		</tr>
		<tr>
			<th>Bulan</th>
			<td>:</td>
			<td><?php echo $bulan ?></td>
		</tr>
		<tr>
			<th>Tahun</th>
			<td>:</td>
			<td><?php echo $tahun ?></td>
		</tr>
	</table>

	<table class="table table-striped table-bordered mt-4">
		<tr>
			<th class="text-center" width="5%">No</th>
			<th class="text-center">Keterangan</th>
			<th class="text-center">Jumlah</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Gaji Pokok</td>
			<td>Rp. <?php echo number_format($ps->gaji_pokok,0,',','.') ?></td>
		</tr>

		<tr>
			<td>2</td>
			<td>Tunjangan Transportasi</td>
			<td>Rp. <?php echo number_format($ps->tj_transport,0,',','.') ?></td>
		</tr>

		<tr>
			<td>3</td>
			<td>Uang Makan</td>
			<td>Rp. <?php echo number_format($ps->uang_makan,0,',','.') ?></td>
		</tr>
		<tr>
			<td>4</td>
			<td>Potongan</td>
			<td>Rp. <?php echo number_format($potongan_gaji,0,',','.') ?></td>
		</tr>
		<tr>
			<th colspan="2" style="text-align: right;">Total Gaji</td>
			<td>Rp. <?php echo number_format($ps->gaji_pokok+$ps->tj_transport+$ps->uang_makan-$potongan_gaji,0,',','.') ?></td>
		</tr>
	</table>

		<table width="100%">
			<tr>
				<td></td>
				<td>
					<p>Pegawai</p>
					<br>
					<br>
					<p class="font-weight-bold"><?php echo $ps->nama_pegawai ?></p>
				</td>

				<td width="200px">
					<p>Surakarta, <?php echo date("d M Y") ?> Bendahara Gaji, </p>
					<br>
					<br>
					<p>__________________</p>
				</td>
			</tr>
		</table>

   <?php endforeach; ?>
</body>
</html>

<script type="text/javascript">
	window.print();
</script>