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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/5.6.0/jquery.min.js"></script>

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
                                Stock Barang
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
                        <h1 class="mt-4">Kelola Akun</h1>


                    
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
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                               <!--  <th>Satuan</th> -->
                                                <!-- <th>Pilihan</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                      <?php
                                        // $iduser = $_SESSION['iduser'];
                                    $ambilsemuadatauser = mysqli_query($conn,"select * from user");
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadatauser)){
                                                $id_user = $data['id_user'];
                                                $username = $data['username'];
                                                $email = $data['email'];
                                                $status = $data['status'];
                                               

                                            ?>

                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$username;?></td>
                                                <td><?=$email;?></td>
                                               
                                                <td>
                                                     <select class="form-control select2me" name="statusUser" id="<?= $id_user ?>" >
                                                     
                                                     <?php if($status === "0"){ $data = "Nonaktif"; ?>
                                                        <option value="1">Aktif</option>
                                                        <option value="0" selected><?= $data ?></option>
                                                     <?php }else { $data = "Aktif"; ?>
                                                        <option value="<?=$status ?>" selected ><?= $data ?></option>
                                                        <option value="0">Nonaktif</option>
                                                    <?php }?>
                                                    
                                                    
                                                    </select>
                                                    <input type="hidden" class="iduser<?= $id_user ?>" name="id_user" value="<?= $id_user ?>">
                                                    <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idm;?>">
                                                        Edit
                                                    </button> -->
                                                    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idm;?>">
                                                        Delete
                                                    </button> -->
                                                </td>
                                            </tr>

                                                    <!-- EditModal -->
                            <div class="modal fade" id="edit<?=$idm;?>">
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
                                    <input type="text" name="satuan" value="<?=$satuan;?>" class="form-control" required>
                                    <br>
                                    <input type="text" name="isi" value="<?=$isi;?>" class="form-control" required>
                                    <br>
                                    <input type="number" name="qty" value="<?=$qty;?>" class="form-control" required>
                                    <br>
                                    <input type="hidden" name="idb" value="<?=$idb;?>">
                                    <input type="hidden" name="idm" value="<?=$idm;?>">
                                    <button type="tambah" class="btn btn-primary" name="updatebarangmasuk">Tambah</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>


                                         <!-- DeleteModal -->
                            <div class="modal fade" id="delete<?=$idm;?>">
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
                                    <input type="hidden" name="kty" value="<?=$qty;?>">
                                    <input type="hidden" name="idm" value="<?=$idm;?>">
                                    <br>
                                    <br>
                                    <button type="hapus" class="btn btn-danger" name="hapusbarangmasuk">Hapus</button>
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
                </main>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
    <div class="modal fade" id="pesan<?=$idm;?>">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Pesan Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                    <input type="text" name="qty" class="form-control" placeholder="jumlah barang" required>
                                    <br>
                                    <input type="hidden" name="idb" value="<?=$idb;?>">
                                    <input type="hidden" name="idm" value="<?=$idm;?>">
                                    <button type="tambah" class="btn btn-primary" name="addbarangkeluar">Tambah</button>
                                    </div>
                                    </form>
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

        <select name='barangnya' class="form-control">
            <?php
                $ambilsemuadatanya = mysqli_query($conn,"select * from stock");
                while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                    $namabarangnya = $fetcharray['namabarang'];
                    $idbarangnya = $fetcharray['idbarang'];

                ?>

                <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>

                <?php

                }

            ?>
        </select>
        <br>
        <input type="number" name="qty" class="form-control" placeholder="Quantity" required>
        <br>
        <input type="number" name="isi" class="form-control" placeholder="isi" required>
        <br>
        <input type="text" name="satuan" class="form-control" placeholder="Satuan" required>
        <br>
        <button type="tambah" class="btn btn-primary" name="barangmasuk">Tambah</button>
        </div>
        </form>
        
        
       
        
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
        $('.select2me').on('change',function(){
            var id_user =  $('.iduser'+this.id).val();
            var statusUser = $('.select2me').val();
            $.ajax({
                type :'POST',
                url : 'function.php',
                data :{id_user:id_user,statusUser:statusUser},
                success : function(data)    
                {
                    alert(data);
                }
            });
        });
    });
  </script>
</html>
