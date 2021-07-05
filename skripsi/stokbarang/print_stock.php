 
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
            <h1> Laporan Stock</h1>
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
                                                <th>Kode Barang</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Satuan</th>
                                                <th>Stock</th>
                                                <th>Harga Jual</th>
                                                <th>Harga Beli</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                      <?php
                                        $iduser = $_SESSION['iduser'];
                                    $ambilsemuadatastock = mysqli_query($conn,"select * from stock where iduser='$iduser' ");
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadatastock)){                                
                                    
                                     $kodebarang = $data['kodebarang'];
                                     $nama = $data['namabarang'];
                                     $kategori = $data['kategori'];
                                     $satuan = $data['satuan'];
                                     $stock = $data['stock'];
                                     $hargajual = $data['hargajual'];
                                     $hargabeli = $data['hargabeli'];
                                    
                                 ?>

                                 <tr>
                                     <td><?=$i++;?></td>
                                     <td><?=$kodebarang;?></td>
                                     <td><?=$nama;?></td>
                                     <td><?=$kategori;?></td>
                                     <td><?=$satuan;?></td>
                                     <td><?=$stock;?></td>
                                    <td><?=$hargajual;?></td>
                                     <td><?=$hargabeli; ?></td>
                                     
                                     </tr>

                                    <?php
                                }; 


                                    ?>  

                                </tbody>
                            </table>
                           
                            <?php?>
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
        window.print();
    </script>
	<script>
		window.print();
	</script>
 
</body>
</html>