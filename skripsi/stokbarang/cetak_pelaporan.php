 
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
 		<center><h1> Laporan Stock Opname<br>Tanggal : <?= $_SESSION['tgl_opname'] ?>  </h1> </center>
 		<br>
	</center>

 	<div class="container">

		<table style="width: 100%" border="1">
			<tr align="center">


	            <th>Kode Barang</th>
	            <th>Nama Barang</th>
	            <th>Kategori</th>
	            <th>Satuan</th>
	            <th>Stock</th>
	            <th>Stock Nyata</th>
	            <th>Selisih</th>
	            <th>Keterangan</th>
	            <!-- <th>Tanggal Opname</th> -->

			</tr>
			<tr align="center">
				
				<td> <?= $_SESSION['kodebarang']; ?></td>
				<td><?= $_SESSION['namabarang']; ?></td>
				<td><?= $_SESSION['kategori']; ?></td>
				<td><?= $_SESSION['satuan']; ?></td>
				<td><?= $_SESSION['stock']; ?></td>
				<td><?= $_SESSION['stocknyata']; ?></td>
				<td><?= $_SESSION['selisih']; ?></td>
				<td><?= $_SESSION['keterangan']; ?></td>
				<!-- <td><?= $_SESSION['tgl_opname']; ?></td> -->
			</tr>
		</table>
	 </div>
	<script>
		window.print();
	</script>
 
</body>
</html>