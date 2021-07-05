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
        <title>Barang Masuk</title>
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
                        <h1 class="mt-4">Rekap Laporan</h1>


                    
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
                                        <th>No</th>
                            <th>Laporan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>

                        <tbody>    
                            

                            <tr>
                                <td>1</td>
                                <td>Laporan Transaksi PerTanggal</td>
                                <td>
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#laptanggal"><span class="fa fa-print"></span> Print</button>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Laporan Transaksi PerMinggu</td>
                                <td>
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lapminggu"><span class="fa fa-print"></span> Print</button>

                                    <!--                                    <form type="submit">
                                        <button class="btn btn-sm btn-secondary" name="laptanggal" type="submit"><span class="fa fa-print"></span> Print</button>        
                                    </form>  -->
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Laporan Transaksi PerBulan</td>
                                <td>
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lapbulan"><span class="fa fa-print"></span> Print</button>
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>


<div class="modal fade" id="lapminggu">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Laporan Per-minggu</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">         
        <label> Tanggal Awal :  </label>
        <input type="date" name="tanggal_awal" class="form-control" required> 
        <br>           
        <button type="submit" class="btn btn-primary" name="lapminggu"><span class="fa fa-print"></span> Print</button>
        </div>
        </form>
        
       
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="lapbulan">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Laporan Per-bulan</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">            
        <label> pilih bulan :  </label>
        <input type="month" name="tanggal_awal" class="form-control" required> 
        <br>           
        <button type="submit" class="btn btn-primary" name="lapbulan"><span class="fa fa-print"></span> Print</button>
        </div>
        </form>
        
       
        
      </div>
    </div>
  </div>


  <div class="modal fade" id="laptanggal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Laporan Per-tanggal</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">            
        <label> Tanggal Awal :  </label>
        <input type="date" name="tanggal_awal" class="form-control" required> 
        <br>
        <label> Tanggal Akhir :  </label>
         <input type="date" name="tanggal_akhir" class="form-control" required> 
        <br>        
        <button type="submit" class="btn btn-primary" name="laptanggal"><span class="fa fa-print"></span> Print</button>
        </div>
        </form>
        
       
        
      </div>
    </div>
  </div>