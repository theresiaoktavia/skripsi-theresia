<?php
require 'function.php';

// cek login, terdaftar atau tidak
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    // cocokin dengan database
    $cekdatabase = mysqli_query($conn,"select * from login WHERE email ='$email' AND password ='$password' ");
    while($data = mysqli_fetch_array($cekdatabase)){
        $_SESSION['iduser'] = $data['iduser'];   
        $_SESSION['username'] = $data['username'];        
    }
    // hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0 && isset($_SESSION['iduser'])){
        $_SESSION['log'] = 'admin';
        header('location:user.php');
    } else {
        $cekdatabase2 = mysqli_query($conn,"select * from user WHERE email ='$email' AND password ='$password' AND status='1' ");
        while($data2 = mysqli_fetch_array($cekdatabase2)){
            $_SESSION['iduser'] = $data2['id_user'];   
            $_SESSION['username'] = $data2['username'];        
        }

        $hitung2 = mysqli_num_rows($cekdatabase2);
        if($hitung2>0 && isset($_SESSION['iduser'])){
            $_SESSION['log'] = 'user';
            header('location:index.php');
        }else{
            header('location:login.php');
        }
    };
};

if(!isset($_SESSION['log'])){

} else if($_SESSION['log'] == "admin"){
    header('location:user.php');
}else{
     header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
