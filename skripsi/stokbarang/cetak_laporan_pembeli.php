
<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Struk</title>
	<link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css">
        	th{ border-bottom: 1px solid black  };
        	table{ border-bottom: 1px solid black  };
        </style>
</head>
<body>
<center>
            <h1> Laporan Pembeli Terlaris</h1>
             <h1>Nama Warung : <?= $_SESSION['username'] ?></h1>

        </center>

 	<div class="container">
		<table style="width: 100%" style="border-bottom: 1px solid black;">
			<tr align="center">
                <th>No</th>
                <th>Nama Penerima</th>
                <th>Total Harga</th>
                <th>Jumlah Pembelian</th>
			</tr>
			<?php 
			$no = 1;
			$iduser = $_SESSION['iduser'];
			$sql = mysqli_query($conn,"select DISTINCT transaksi.penerima as nama , (select SUM(DISTINCT total) from transaksi WHERE transaksi.penerima = nama ) as jumlah_transaksi , (select COUNT(transaksi.penerima) FROM transaksi WHERE transaksi.penerima = nama ) as total_beli from transaksi WHERE idUser = '$iduser' ");



			while($data3 = mysqli_fetch_array($sql)){
			?>
			<tr align="center">
				<td><?php echo $no++; ?></td>
				<td><?php echo $data3['nama']; ?></td>
				<td><?php echo $data3['jumlah_transaksi']; ?></td>
				<td><?php echo $data3['total_beli']; ?></td>
			</tr>
			<?php };?>
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
	 </div>
	<script>
		window.print();
	</script>
 
</body>
</html>