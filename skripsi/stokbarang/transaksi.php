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
                        <h1 class="mt-4">Rekap Transaksi</h1>


                    
                        <div class="card mb-4">
                            <div class="card-header">
                                 <!-- Button to Open the Modal -->
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Barang
                            </button> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                               <th>No</th>
                                                <th>ID Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Total</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $iduser = $_SESSION['iduser'];
                                    $ambilsemuadatastock = mysqli_query($conn,"select * from transaksi WHERE iduser='" . $iduser . "'");
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                             
                                                $id_transaksi = $data['id_transaksi'];
                                                $tanggal = $data['tanggal'];
                                                $total = $data['total'];

                                            ?>

                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$id_transaksi;?></td>
                                                <td><?=$tanggal;?></td>
                                                <td><?=$total;?></td>
                                                <td>
                                                    <form method="post" style="display:inline;">
                                                    <input type="text" name="id_transaksi" value="<?=$id_transaksi;?>" hidden>
                                                    <button type="submit" name="cetak_faktur" class="btn btn-primary"><span class="fa fa-print" ></span>Faktur</button>                                                        
                                                    </form>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$id_transaksi;?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                                    <!-- EditModal -->
                            <div class="modal fade" id="edit<?=$idb;?>">
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
                                            <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="kategori" value="<?=$kategori;?>" class="form-control" required>
                                            <br>
                                           <input type="number" name="stock" value="<?=$stock;?>" class="form-control" required>
                                            <br>
                                             <input type="text" name="satuan" value="<?=$satuan;?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="hargabeli" value="<?=$hargabeli;?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="hargajual" value="<?=$hargajual;?>" class="form-control" required>
                                            <br>
                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                            <button type="tambah" class="btn btn-primary" name="updatebarang">Tambah</button>
                                            </div>
                                    </form>
                                </div>
                                </div>
                            </div>


                                         <!-- DeleteModal -->
                            <div class="modal fade" id="delete<?=$id_transaksi;?>">
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
                                                            Apakah Anda yakin ingin menghapus <?=$id_transaksi;?>?
                                                            <input type="hidden" name="id_transaksi" value="<?=$id_transaksi;?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="hapustransaksi">Hapus</button>
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
          <h4 class="modal-title">Tambah Barang Masuk</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">

            <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
            <br>
            <input type="text" name="kategori" placeholder="Kategori" class="form-control" required>
            <br>
             <select name="satuan" class="form-control" required="">
                            <option value="PCS">PCS</option>
                            <option value="pax">pax</option>
                            <option value="dus">dus</option>
                            <option value="lusin">lusin</option>
                          </select>
            <br>
            <input type="text" name="isi" placeholder="Isi" class="form-control" required>
            <br>
            <input type="number" name="stock" class="form-control" placeholder="Stock" required>
            <br>
            <input type="text" name="hargabeli" placeholder="Harga Beli" class="form-control" required>
            <br>
            <input type="text" name="hargajual" placeholder="Harga Jual" class="form-control" required>
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
