<?php
session_start();
require 'function.php';

// cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT username FROM admin WHERE id = $id" );
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
      $_SESSION ['login'] = true ;
  }

}

if (isset($_SESSION["login"])){
  header("location:index.php");
}


if (isset ($_POST["login"])){

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query ($conn, "SELECT * FROM admin WHERE username= '$username'");

  // cek username
  if (mysqli_num_rows($result)==1){

    // cek password 
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])){

      // set session
      $_SESSION["login"] = true;

      // cek remember me
      if( isset($_POST['remember']) ){
        // buat cookie
        setcookie( 'id', $row['id'], time() +3600 );
        setcookie( 'key', hash('sha256', $row['username']), time()+3600 );
        }

     header("location:index.php");
           exit;
     }

    }

    $error = true;
}



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="css/style.css">

    <title>Halaman login</title>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="login.php">
       <img src="img/logo.png" alt="" width="150" height="30">
      </a>
    </div>
    </nav>
    <!-- akhir navbar -->
   
    <!-- Login Admin -->
    <section id="login">
      <div class="container mt-5">  
        <div class="row justify-content-center">
          <div class="col-md-6 form kotak">
            <div class="mt-3 mb-3 text-center">
                <h3>Login User</h3>
            </div>

            <form action="" method="post">
              <div class="mb-3">    
                <input type="text" class="form-control" placeholder="username" id="inputPassword" name="username">
              </div>

              <div class="mb-3">
                 <input type="password" class="form-control" name="password" placeholder="password" id="inputPassword">
              </div>

              <div class="mb-3">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
              </div>

              <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary" name="login">Login</button>
                <p>No account yet ? <a href="registrasi.php" style="color:green;">Sign Up</a></p>
              </div>

              
            </form>

          </div>
        </div>
      </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>