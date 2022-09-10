<?php
require 'function.php';

// untuk mengambil data dari URL
$id=$_GET["id"];

// query data product berdasarkan id
$product = query("SELECT * FROM product_elektronik WHERE id=$id")[0];  

// cek apakah submit sudah ditekan atau belum
if (isset ($_POST["submit"])){

    // cek apakah data berhasil diubah?
    if (ubah($_POST) > 0){
      echo "
            <script> 
              alert ('data berhasil diubah!');
              document.location.href = 'admin.php';
            </script>
           ";
    } else {
      echo "
           <script> 
             alert ('data gagal diubah!');
             document.location.href = 'admin.php';
           </script>";
    };
     
  };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="css/style.css"> 

</head>
<body>

   <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
       <img src="img/logo.png" alt="" width="150" height="30">
      </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin.php">Daftar Product</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="tambah.php">Tambah Data</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="">Ubah Data</a>
            </li>
        </ul>
        <a href="index.php" class="ms-auto"><button type="submit" class="btn btn-danger">Logout</button></a>
        </div>
    </div>
    </nav>

   <!-- akhir navbar -->

   <!-- header -->

   <section id="header">
    <div class="container">
        <div class="row">
            <div class="col">
                 <h1>Ubah Data</h1>
                 <p> <?php echo date("l, d-M-Y");?> </p>
            </div>
        </div>
    </div>
   </section>
   <!-- akhir header -->

   <!-- Form -->
   <section id="form">
     <div class="container">
        <div class="row">
            <div class="col-5">
                <form action="" method="post">
                <input type="hidden" name="id" value="<?= $product["id"] ?>">
                <div class="mb-2">
                    <label for="product" class="form-label">Product</label>
                    <input type="text" class="form-control" id="product" name="product" required value="<?= $product["product"] ?>">
                </div>
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="product" name="nama" required value="<?= $product["nama"] ?>">
                </div>
                <div class="mb-2">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="product" name="harga" required value="<?= $product["harga"] ?>">
                </div>
                <div class="mb-2">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <input type="text" class="form-control" id="product" name="kondisi" required value="<?= $product["kondisi"] ?>">
                </div>
                <div class="mb-2">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="text" class="form-control" id="product" name="gambar" required value="<?= $product["gambar"] ?>">
                </div>
                <button type="submit" class="btn btn-warning" name="submit">Ubah Data</button>
                </form>
            </div>

        </div>
    </div>
   </section>
   <!-- Akhir Form -->

    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>