 
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
 		<center>
            <h1> Laporan Barang Terlaris Terjual</h1>
             <h1>Nama Warung : <?= $_SESSION['username'] ?></h1> 
        </center>
 		<br>
	</center>

 	        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               <th>No</th>
                                                <!-- <th>ID Barang</th> -->
                                                <th>Nama</th>
                                                <th>Jumlah Terjual</th>
                                                <th>Total Harga</th>
                                                <th>Profit</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $iduser = $_SESSION['iduser'];
                                    $ambildata = mysqli_query($conn,"SELECT   keluar.idbarang as id_barang, stock.namabarang as nama_barang ,stock.hargajual, stock.hargabeli, SUM(keluar.qty) as qty,SUM(keluar.totalharga) as total_penjualan,SUM((stock.hargajual-stock.hargabeli)*keluar.qty) as profit  FROM keluar INNER JOIN stock ON keluar.idbarang = stock.idbarang WHERE keluar.iduser = '$iduser' GROUP BY id_barang");
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambildata)){
                                             
                                                // $id_barang = $data['id_barang'];
                                                $nama = $data['nama_barang'];
                                                $qty = $data['qty'];
                                                $harga = $data['total_penjualan'];
                                                $profit = $data['profit'];
                                            ?>

                                            <tr>
                                                <td><?=$i++;?></td>
                                                <!-- <td><?=$id_barang;?></td> -->
                                                <td><?=$nama;?></td>
                                                <td><?=$qty;?></td>
                                                <td><?=$harga;?></td>
                                                <td><?=$profit; ?></td>
                                            </tr>

                                        <?php
                                    };

                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
    <p> Jam Cetak : <?php 

        $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        echo $dt->format('H:i:s');
     ?> </p>
     <p> Tanggal Cetak : <?php 

        $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        echo $dt->format('d-m-Y');
     ?> </p>     
    <script>
	<script>
		window.print();
	</script>
 
</body>
</html>