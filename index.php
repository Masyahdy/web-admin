<?php

// apakah admin sudah ditekan?
if (isset($_POST["submit"])) {
  if ($_POST["username"]=="admin" && $_POST["password"]=="123"){
    header("Location:admin.php");
    exit;
  } else {
    $error = true;
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

    <title>Halaman login</title>
  </head>
  <body>
   
    <!-- Login Admin -->
    <section id="login">
      <div class="container">  
        <div class="row justify-content-center">
          <div class="col-md-6 form kotak">
            <div class="row text-center">
              <div class="col mt-3">
                <img src="img/admin.png" alt="" width="100px" class="rounded-circle img-thumbnail">
              </div>
            </div>

            <h3 class="text-center">Login Admin</h3>
          
            <form action="" method="post">
              <div class="mb-3">    
                <input type="text" class="form-control" placeholder="username" id="inputPassword" name="username">
              </div>

              <div class="mb-3">
                 <input type="password" class="form-control" name="password" placeholder="password" id="inputPassword">
              </div>

              <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
              </div>

              <div class="mb-3 text-center">
                      <p>password sudah benar?</p>  
                <?php if (isset($error)) { ?>
                     <p style="color:red;">username atau password anda salah</p>
                <?php } ?>
              </div>
            </form>

          </div>
        </div>
      </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>