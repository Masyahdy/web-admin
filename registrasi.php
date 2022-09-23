<?php
require 'function.php';

if ( isset($_POST["register"]) ) {
    if (registrasi($_POST) > 0){
        echo "<script>
                alert ('User baru berhasil ditambahkan!');
              </script>";
    } else {
        echo mysqli_error($conn);
    }
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

    <title>Halaman Registrasi</title>
  </head>
  <body>
   
    <!-- Registrasi Admin -->
    <section id="registrasi">
      <div class="container">  
        <div class="row justify-content-center">
          <div class="col-md-6 form kotak">
            <div class="mt-3 mb-3 text-center">
                <h3>Registrasi User</h3>
            </div>
            <form action="" method="post">
              <div class="mb-3">   
                <input type="text" class="form-control" placeholder="username" id="inputPassword" name="username">
              </div>

              <div class="mb-3">
                 <input type="password" class="form-control" name="password" placeholder="password" id="inputPassword">
              </div>

              <div class="mb-3">
                 <input type="password" class="form-control" name="password2" placeholder="konfirmasi password" id="inputPassword2">
              </div>

              <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success" name="register">Sign Up</button>
                <p>Already have an account ? <a href="login.php" style="color:red;">Sign In</a> </p>
              </div>

            </form>

          </div>
        </div>
      </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>