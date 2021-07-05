
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
            <h1> Struck Transaksi</h1>
             <h1>Nama Warung : <?= $_SESSION['username'] ?></h1> 
        </center>
 	<div class="container">
		<table style="width: 100%" style="border-bottom: 1px solid black;">
			<tr align="center">
				<th width="5%">NO</th>
				<th>Nama Barang</th>
				<th>Jumlah Barang</th>			
				<th>Harga</th>
			</tr>
			<?php 
			$no = 1;
			$id_transaksi = $_SESSION['id_transaksi'];
			$sql = mysqli_query($conn,"select stock.* , keluar.* from keluar INNER JOIN stock ON keluar.idbarang = stock.idbarang WHERE id_transaksi ='$id_transaksi' ");



			while($data3 = mysqli_fetch_array($sql)){
			?>
			<tr align="center">
				<td><?php echo $no++; ?></td>
				<td><?php echo $data3['namabarang']; ?></td>
				<td><?php echo $data3['qty']; ?></td>
				<td><?php echo $data3['totalharga']; ?></td>
			</tr>
			<?php };?>
			<tr>
				<td colspan ="2" align="right"></td>
				<td  align="center"> Total Harga </td>
				<td align="center"> <?= $_SESSION['harga_total'] ?> </td>
			</tr>
		</table>
		<p> Jam Cetak : <?php 

        $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        echo $dt->format('H:i:s');
     ?> </p>    
	 </div>
	<script>
		window.print();
	</script>
 
</body>
</html>