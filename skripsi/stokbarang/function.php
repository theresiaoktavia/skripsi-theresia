 <?php
session_start();

// membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stockbarang");

// menambah barang baru
if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $kategori = $_POST['kategori'];    
    $satuan = $_POST['satuan'];
    $isi = $_POST['isi'];
    $jumlah = $_POST['jumlah'];
    $hargajual = $_POST['hargajual'];
    $hargabeli = $_POST['hargabeli'];
    $idUser = $_SESSION['iduser'];
    $stock = $jumlah * $isi;

    $kode_barang = rand(1000,9999);

    $addtotable = mysqli_query($conn,"insert into stock (kodebarang,namabarang,kategori,satuan,isi,stock, hargajual, hargabeli,iduser) values('$kode_barang','$namabarang','$kategori','$satuan','$isi','$stock', '$hargajual','$hargabeli', '$idUser')") or die(mysqli_error($conn)); ;
    if($addtotable&&$update){
        echo "berhasil";
        header('location:index.php');
    } else {

       header('location:index.php');
    }
};
// registrasi akun
if(isset($_POST['registrasi'])){
    $nama_warung = $_POST['nama_warung'];
    $username = $_POST['username'];    
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $addtotable = mysqli_query($conn,"insert into user (nama_warung,username,email,password) values('$nama_warung','$username','$email','$password')") or die(mysqli_error($conn)); ;
    if($addtotable&&$update){
        echo "berhasil";
        header('location:login.php');
    } else {

       header('location:register.php');
    }
};


// menambah barang masuk
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $isi = $_POST['isi'];
    $satuan = $_POST['satuan'];
    $qty = $_POST['qty'];
    $tambahStock = $isi * $qty;
    $iduser = $_SESSION['iduser'];

    $cekstockbarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstockbarang);

    $stocksekarang = $ambildatanya['stock'];
    $updateStock = $stocksekarang+$tambahStock;

    $addtomasuk = mysqli_query($conn,"insert into masuk (idbarang, satuan,keterangan, isi, qty,iduser) values('$barangnya','$satuan','$penerima','$isi','$qty','$iduser')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock='$updateStock' where idbarang='$barangnya'");
    if($addtomasuk&&$updatestockmasuk){
        header('location:masuk.php');
    } else {
        echo 'Gagal';
        header('location:masuk.php');
    }

// menambah barang keluar
if(isset($_POST['addbarangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $iduser = $_SESSION['iduser'];
    $qty = $_POST['qty'];
    $ket = $_POST['ket'];

    $cekstockbarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstockbarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;
    $hargatotal = $ambildatanya['hargajual'] * $qty;

    $addtokeluar = mysqli_query($conn,"insert into keluar (idbarang, penerima, qty,ket,iduser,totalharga) values('$barangnya','$penerima','$qty','$ket','$iduser','$hargatotal')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
    if($addtokeluar&&$updatestockmasuk){
        header('location:keluar.php');
    } else {
        echo 'Gagal';
        header('location:keluar.php');
    }
}



// update info barang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $kategori = $_POST['kategori'];    
    $satuan = $_POST['satuan'];
    $stock = $_POST['stock'];
    $hargajual = $_POST['hargajual'];
    $hargabeli = $_POST['hargabeli'];
    $updatenya = mysqli_query($conn, "update stock set namabarang='$namabarang', kategori='$kategori',satuan='$satuan',stock='$stock',hargajual='$hargajual',hargabeli='$hargabeli' where idbarang='$idb'");
    
    if($update){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
}
// Stok opname

if(isset($_POST['stockopname'])){
    $idb = $_POST['idb'];
    $stock = $_POST['stock'];
    $stocknyata = $_POST['stocknyata'];
    $selisih =  $stock - $stocknyata;
    $keterangan = $_POST['keterangan'];
    $tgl_opname = $_POST['tgl_opname'];
    $iduser = $_SESSION['iduser'];
    $updatenya = mysqli_query($conn, "update stock set selisih='$selisih',stocknyata='$stocknyata',tgl_opname='$tgl_opname',keterangan='$keterangan' where idbarang='$idb'") or die(mysqli_error($conn));
    
    if($update){
        header('location:pelaporan.php');
    } else {
        echo 'Gagal';
        header('location:pelaporan.php');
    }
}
// menghapus barang dari stock
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];

    $hapus = mysqli_query($conn, "delete from stock where idbarang='$idb'");
    if($hapus){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

if(isset($_POST['hapustransaksi'])){
    $id_transaksi = $_POST['id_transaksi'];

    $hapus = mysqli_query($conn, "delete from transaksi where id_transaksi='$id_transaksi'");
    if($hapus){
        header('location:transaksi.php');
    } else {
        echo 'Gagal';
        header('location:transaksi.php');
    }
};

// mengubah data barang masuk
if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $deskripsi = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "select * from masuk where idmasuk='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update masuk set qty='$qty', keterangan='$deskripsi' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
            } else {
                echo 'Gagal';
                header('location:masuk.php');
            }
    } else {
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg + $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update masuk set qty='$qty', keterangan='$deskripsi' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
            } else {
                echo 'Gagal';
                header('location:masuk.php');
            }
        }
    }




    // menghapus barang masuk
    if(isset($_POST['hapusbarangmasuk'])){
        $idb = $_POST['idb'];
        $qty = $_POST['kty'];
        $idm = $_POST['idm'];

        $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
        $data = mysqli_fetch_array($getdatastock);
        $stok = $data['stock'];

        $selisih = $stok-$qty;

        $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
        $hapusdata = mysqli_query($conn,"delete from masuk where idmasuk='$idm'");

        if($update&&$hapusdata){
            header('location:masuk.php');
        } else {
            header('location:masuk.php');
        }

    }



    // mengubah data barang keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "select * from keluar where idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('location:keluar.php');
            } else {
                echo 'Gagal';
                header('location:keluar.php');
            }
    } else {
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg + $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update keluarset qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('location:keluar.php');
            } else {
                echo 'Gagal';
                header('location:keluar.php');
            }
        }
    }


    // menghapus barang keluar
    if(isset($_POST['hapusbarangkeluar'])){
        $idb = $_POST['idb'];
        $qty = $_POST['kty'];
        $idk = $_POST['idk'];

        $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
        $data = mysqli_fetch_array($getdatastock);
        $stok = $data['stock'];

        $selisih = $stok+$qty;

        $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
        $hapusdata = mysqli_query($conn,"delete from keluar where idkeluar='$idk'");

        if($update&&$hapusdata){
            header('location:keluar.php');
        } else {
            header('location:keluar.php');
        }
    }

    if(isset($_POST['aksicheckhout'])){
        $iduser = $_SESSION['iduser'];
        $penerima = $_POST['penerima'];
        $tanggal = date('Y-m-d');
        $totalHarga = 0;
        $idtransaksi = "TRA-".date('Y-m-d-h-i-s');
        $ambilsemuadatastock = mysqli_query($conn,"select * from keluar k, stock s where s.idbarang = k.idbarang AND k.penerima='' ");
        while($data=mysqli_fetch_array($ambilsemuadatastock)){
            $idkeluar = $data['idkeluar'];
            $update = mysqli_query($conn,"update keluar set id_transaksi='$idtransaksi',penerima='$penerima' where idkeluar='$idkeluar'");
            $totalHarga = $totalHarga + $data['totalharga'];
        }

        $transaksi = mysqli_query($conn,"insert into transaksi (id_transaksi,tanggal,penerima,iduser, total) values('$idtransaksi','$tanggal','$penerima','$iduser','$totalHarga')");

        header('location:transaksi.php');

    }

    if(isset($_POST['laptanggal'])){

        $_SESSION['laptanggal'] = true;
        $_SESSION['tanggal_awal'] = $_POST['tanggal_awal'];
        $_SESSION['tanggal_akhir'] = $_POST['tanggal_akhir'];
        $time1 = strtotime($_POST['tanggal_awal']);
        $time2 = strtotime($_POST['tanggal_akhir']);
        $_SESSION['tgl_awal'] = date("d",$time1). "-" .date("m",$time1) . "-" . date("Y",$time1);
        $_SESSION['tgl_akhir'] = date("d",$time2). "-" .date("m",$time2) . "-" . date("Y",$time2);

        header('location:cetak.php');

    }

    if(isset($_POST['lapminggu'])){

        $_SESSION['lapminggu'] = true;
        $time1=strtotime($_POST['tanggal_awal']);
        $_SESSION['tanggal_awal'] = $_POST['tanggal_awal'];
        $_SESSION['tgl_awal'] = date("d",$time1). "-" .date("m",$time1) . "-" . date("Y",$time1);


        header('location:cetak.php');

    }

    if(isset($_POST['lapbulan'])){

        $_SESSION['lapbulan'] = true;
        $time=strtotime($_POST['tanggal_awal']);
        $_SESSION['tanggal_awal'] = "Bulan " . date("F",$time). "-" .$year=date("Y",$time);


        header('location:cetak.php');

    }


    if(isset($_POST['cetak_faktur']))
    {

        $_SESSION['id_transaksi'] = $_POST['id_transaksi'];
        $id_transaksi = $_SESSION['id_transaksi'];
        $sql = mysqli_query($conn,"select * from keluar WHERE id_transaksi ='$id_transaksi' ");
        while($data = mysqli_fetch_array($sql)){
            $_SESSION['penerima'] = $data['penerima'];
            
        }
        $sql2 = mysqli_query($conn,"select * from transaksi WHERE id_transaksi ='$id_transaksi' ");
        while($data2 = mysqli_fetch_array($sql2)){
            $_SESSION['harga_total'] = $data2['total'];
            $_SESSION['penerima'] = $data2['penerima'];
            $_SESSION['tgl_transaksi'] = $data2['tanggal'];
        }

        header('location:cetak_struk.php');
    }

    if(isset($_POST['pelaporan'])){
        $sql = mysqli_query($conn, "Select * from stock");
        while($data = mysqli_fetch_array($sql)){
            $iduser = $_SESSION['iduser'];
            $_SESSION['idbarang'] = $data['idbarang'] ;
            $_SESSION['kodebarang'] = $data['kodebarang'];
            $_SESSION['namabarang'] = $data['namabarang'];
            $_SESSION['kategori'] = $data['kategori'];
            $_SESSION['satuan'] = $data['satuan'];
            $_SESSION['stock'] = $data['stock'];
            $_SESSION['stocknyata'] = $data['stocknyata'];
            $_SESSION['selisih'] = $data['selisih'];
            $_SESSION['keterangan'] = $data['keterangan'];
            $_SESSION['tgl_opname'] = $data['tgl_opname'];
            
        }
        header('location:cetak_pelaporan.php');
    }       
    if(isset($_POST['print_t'])){
        header('location:print_terlaris.php');
    }
    if(isset($_POST['pelaporan'])){
        $sql = mysqli_query($conn, "Select * from stock");
        while($data = mysqli_fetch_array($sql)){
            $_SESSION['idbarang'] = $data['idbarang'] ;
            $_SESSION['kodebarang'] = $data['kodebarang'];
            $_SESSION['namabarang'] = $data['namabarang'];
            $_SESSION['kategori'] = $data['kategori'];
            $_SESSION['satuan'] = $data['satuan'];
            $_SESSION['stock'] = $data['stock'];
            $_SESSION['stocknyata'] = $data['stocknyata'];
            $_SESSION['selisih'] = $data['selisih'];
            $_SESSION['keterangan'] = $data['keterangan'];
            $_SESSION['tgl_opname'] = $data['tgl_opname'];
        }
        header('location:cetak_pelaporan.php');
    }       
    if(isset($_POST['print_p'])){
        header('location:print_stockopname.php');
    }
     if(isset($_POST['pelaporan'])){
        $sql = mysqli_query($conn, "Select * from stock");
        while($data = mysqli_fetch_array($sql)){
            $iduser = $_SESSION['iduser'];
            $_SESSION['idbarang'] = $data['idbarang'] ;
            $_SESSION['kodebarang'] = $data['kodebarang'];
            $_SESSION['namabarang'] = $data['namabarang'];
            $_SESSION['kategori'] = $data['kategori'];
            $_SESSION['satuan'] = $data['satuan'];
            $_SESSION['stock'] = $data['stock'];
            $_SESSION['stocknyata'] = $data['stocknyata'];
            $_SESSION['selisih'] = $data['selisih'];
            $_SESSION['keterangan'] = $data['keterangan'];
            $_SESSION['tgl_opname'] = $data['tgl_opname'];
            
        }
        header('location:cetak_pelaporan.php');
    }       
    if(isset($_POST['print_m'])){
        header('location:print_stock.php');
    }

    if(isset($_POST['statusUser'])){
        $status = $_POST['statusUser'];
        $id_user = $_POST['id_user'];
        $updateData = mysqli_query($conn,"update user set status='$status' where id_user='$id_user'");
        if($updateData)
        {   
            $status = "Update Data Berhasil";
            echo json_encode($status);
        }
    }
?>
