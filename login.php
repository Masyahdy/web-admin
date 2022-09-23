<?php
session_start();

if (isset($_SESSION["login"])){
  header("location:index.php");
}


require 'function.php';

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
   
    <!-- Login Admin -->
    <section id="login">
      <div class="container">  
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