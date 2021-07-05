 
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
 		<center><h1> Laporan Stockopname</h1> 
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
                                                <th>Stock</th>
                                                <th>Stocknyata</th>
                                                <th>Tanggal</th>
                                                <th>Selisih</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                       
                                        <?php
                                    $iduser = $_SESSION['iduser'];      
                                    $ambilsemuadatastock = mysqli_query($conn,"select * from stock where iduser='$iduser' ");
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadatastock)){                                
                                    
                                     // $id_barang = $data['id_barang'];
                                     $nama = $data['namabarang'];
                                     $stock = $data['stock'];
                                     $stocknyata = $data['stocknyata'];
                                     $tgl_opname = $data['tgl_opname'];
                                     $selisih = $data['selisih'];
                                 ?>

                                 <tr>
                                     <td><?=$i++;?></td>
                                     <!-- <td><?=$id_barang;?></td> -->
                                     <td><?=$nama;?></td>
                                     <td><?=$stock;?></td>
                                     <td><?=$stocknyata;?></td>
                                     <td><?=$tgl_opname; ?></td>
                                     <td><?=$selisih; ?></td>
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
 
</body>
</html>