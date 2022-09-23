<?php
session_start();

if ( !isset($_SESSION["login"])){
    header("location:login.php");
    exit;
}

require 'function.php';
$product = query("SELECT * FROM product_elektronik");

// jika tombol cari ditekan
if (isset($_POST["cari"])){
    $product = cari($_POST["keyword"]);
}


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
            <a class="nav-link active" aria-current="page" href="index.php">Daftar Product</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="tambah.php">Tambah Data</a>
            </li>
        </ul>
            <form class="d-flex ms-auto" action="" method="post">
                <input class="form-control me-2" type="search" placeholder="ketik keyword yang dicari" aria-label="Search" size="40" name="keyword" autofocus autocomplete="off">
                <button class="btn btn-outline-warning" type="submit" name="cari">Search</button>
            </form>
        </div>
    </div>
    </nav>

   <!-- akhir navbar -->

   <!-- header -->

   <section id="header">
    <div class="container">
        <div class="row">
            <div class="col-6">
                 <h1>Selamat datang Admin</h1>
                 <p> <?php echo date("l, d-M-Y");?> </p>
            </div>
            <div class="col-6 mt-2 text-end">
                 <a href="logout.php"><button type="submit" class="btn btn-danger">Logout</button></a>

            </div>
        </div>
    </div>
   </section>

   <!-- akhir header -->

   <!-- table -->
    <section id="table" class="mt-2">
     <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-success table-hover">
                    <tr>
                     <th>No.</th>
                     <th>Aksi</th>
                     <th>Gambar</th>
                     <th>Product</th>
                     <th>Nama</th>
                     <th>Kondisi</th>
                     <th>Harga</th>
                    </tr>
            <?php $i=1;?>
            <?php foreach ($product as $row) {?>
                    <tr>
                     <td><?php echo $i ?></td>
                     <td><a href="ubah.php?id=<?= $row["id"]?>"><button type="submit" class="btn btn-warning" name="submit">Ubah</button></a> | 
                     <a href="hapus.php?id=<?= $row["id"]?>" onclick ="return confirm('Apakah benar data ingin dihapus!')"><button type="submit" class="btn btn-danger" name="submit">Hapus</button></a>
                     </td>
                     <td><img src="img/product/<?php echo $row["gambar"]?>" width="50"></td>
                     <td><?php echo $row["product"]?></td>
                     <td><?php echo $row["nama"]?></td>
                     <td><?php echo $row["kondisi"]?></td>
                     <td><?php echo $row["harga"]?></td>
                    </tr>
            <?php $i++; ?>
            <?php } ?>

                </table>
            </div>
        </div>
     </div>
    </section>
    <!-- akhir table -->

    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>