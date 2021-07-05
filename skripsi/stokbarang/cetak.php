
<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Laporan</title>
</head>
<body>
 
	<center>
 	
 	<?php

 		if(isset($_SESSION['laptanggal'])){
 			echo "<h2>Rekap Laporan per tanggal</h2>";
 			echo "<h2>". $_SESSION['tgl_awal']  ." - "  .$_SESSION['tgl_akhir'].  "</h2>";
	
 		}else if(isset($_SESSION['lapminggu'])){
 			$tanggal_akhir = date('d-m-Y', strtotime($_SESSION['tanggal_awal']. ' + 7 days'));
			echo "<h2>Rekap Laporan per Minggu</h2>";
 			echo "<h2>". $_SESSION['tgl_awal']  ." - "  . $tanggal_akhir .  "</h2>";
 		}else if(isset($_SESSION['lapbulan'])){
			echo "<h2>Rekap Laporan per Bulan</h2>";
 			echo "<h2>". $_SESSION['tanggal_awal'] . "</h2>";
 		}

 	?>

 	<h1>Nama Warung : <?= $_SESSION['username'] ?></h1>
 
	</center>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="5%">No</th>
			<th>ID Transaksi</th>			
			<th>Tanggal</th>
			<th width="5%">Total Harga</th>
		</tr>
		<?php 
		$tanggal_awal = $_SESSION['tanggal_awal'];

		$no = 1;

		$sql = null;

		if(isset($_SESSION['laptanggal'])){

			$tanggal_akhir = $_SESSION['tanggal_akhir'];
			$sql = mysqli_query($conn,"select *,DATE_FORMAT(tanggal, '%d/%m/%Y') as tgl from transaksi WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ");	
			unset($_SESSION['laptanggal']);
			unset($_SESSION['tanggal_awal']);
			unset($_SESSION['tanggal_akhir']);		
		}else if(isset($_SESSION['lapminggu'])){

			$tanggal_akhir = date('Y-m-d', strtotime($tanggal_awal. ' + 7 days'));
			$sql = mysqli_query($conn,"select *,DATE_FORMAT(tanggal, '%d/%m/%Y') as tgl from transaksi WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ");
			unset($_SESSION['lapminggu']);
			unset($_SESSION['tanggal_awal']);
		}else if(isset($_SESSION['lapbulan'])){

			$sql = mysqli_query($conn,"select *,DATE_FORMAT(tanggal, '%d/%m/%Y') as tgl From transaksi WHERE tanggal BETWEEN '$tanggal_awal' AND LAST_DAY(' $tanggal_awal ') ");

			unset($_SESSION['lapbulan']);
			unset($_SESSION['tanggal_awal']);
		}

		$total_harga = 0;

		while($data = mysqli_fetch_array($sql)){ $total_harga = $total_harga + $data['total'];
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['id_transaksi']; ?></td>
			<td><?php echo $data['tgl']; ?></td>
			<td><?php echo $data['total']; ?></td>
		</tr>
		<?php  };?>
		<tr>
			
			<td colspan="3"> Total Harga </td>
			<td> <?= $total_harga ?></td>
		</tr>
	</table>
 	<p> Jam Cetak : <?php 

	 	$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
	 	echo $dt->format('H:i:s');
 	 ?> </p>
 	  <p> Tanggal Cetak : <?php 

        $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        echo $dt->format('d-m-Y');
     ?> </p>   	
	<script>
		window.print();
	</script>
 
</body>
</html>