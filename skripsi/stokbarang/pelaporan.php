<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Warung Kelontong</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="nav">
                        <br>
                        </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Master Stock
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Transaksi 
                            </a>
                            <a class="nav-link" href="pelaporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Opname
                            </a>
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                Rekap Laporan
                            </a>
                            <a class="nav-link" href="transaksi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rekap Transaksi
                            </a>
                            <a class="nav-link" href="terlaris.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                Pembelian Terlaris
                            </a>                  
                            <a class="nav-link" href="pembeli_terbanyak.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                Pelanggan Terbanyak
                            </a>                                                         
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Stock Opname Barang</h1>


                    
                        <div class="card mb-4">
                            <div class="card-header">
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah
                            </button> -->
                            
                            </button>
                            </div>
                            <div class="card-body">
                            <form method="post">
                                <button name="print_p" class="btn btn-primary"> Print Data </button>
                            </form
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Stock</th>
                                                <th>Stock Nyata</th>
                                                <th>Tanggal</th>
                                                <th>Selisih</th>
                                                <th>Keterangan</th>
                                                
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                    $iduser = $_SESSION['iduser'];      
                                    $ambilsemuadatastock = mysqli_query($conn,"select * from stock where iduser='$iduser' ");
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                             
                                                
                                                $kodebarang = $data['kodebarang'];
                                                $namabarang = $data['namabarang'];
                                                $kategori = $data['kategori'];
                                                $satuan = $data['satuan'];
                                                $isi = $data['isi'];
                                                $stock = $data['stock'];
                                                $tanggal = $data['tanggal'];
                                                $hargabeli = $data['hargabeli'];
                                                $hargajual = $data['hargajual'];
                                                $stocknyata = $data['stocknyata'];
                                                $tgl_opname = $data['tgl_opname'];
                                                $selisih = $data['selisih'];
                                                $keterangan = $data['keterangan'];
                                                $idb = $data['idbarang'];

                                            ?>

                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$kodebarang;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$stock;?></td>
                                                <td><?=$stocknyata;?></td>
                                                <td><?=$tgl_opname;?></td>
                                                <td><?=$selisih;?></td>
                                                <td><?=$keterangan;?></td>
                                               
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$kodebarang;?>">
                                                        Hitung
                                                    </button>
                                                    <!-- <form method="post">
                                                    <button type="submit" class="btn btn-primary" name="pelaporan" ><span class="fa fa-print"></span> Print</button> </form> -->

                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                                    <!-- EditModal -->
                            <div class="modal fade" id="edit<?=$kodebarang;?>">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Edit Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method="post">
                                            <div class="modal-body">
                                            <input type="text" name="stocknyata" value="<?=$stocknyata;?>" class="form-control" required>
                                            <br>
                                            <input type="date" name="tgl_opname" value="<?=$tgl_opname;?>" class="form-control" required>
                                            <br>
                                           <textarea name="keterangan" value="<?=$keterangan;?>" class="form-control" required> </textarea>
                                            <br>
                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                            <input type="hidden" name="stock" value="<?=$stock;?>">
                                            <button type="tambah" class="btn btn-primary" name="stockopname">Tambah</button>
                                            </div>
                                    </form>
                                </div>
                                </div>
                            </div>


                                         <!-- DeleteModal -->
                            <div class="modal fade" id="delete<?=$idb;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Barang ?</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus <?=$namabarang;?>?
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    };

                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Stockopname</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">

            <input type="text" name="stocknyata" placeholder="Stock Nyata" class="form-control" required>
            <br>
            <input type="text" name="selisih" placeholder="selisih" class="form-control" required>
            <br>
            <input type="text" name="keterangan" placeholder="keterangan" class="form-control" required>
            <br>
            <input type="date" name="tgl" placeholder="tangggal" class="form-control" required>
            <br>
        <button type="tambah" class="btn btn-primary" name="addnewbarang">Tambah</button>
        </div>
        </form>
        
       
        
      </div>
    </div>
  </div>
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
</body>



</html>
