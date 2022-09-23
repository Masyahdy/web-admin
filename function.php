<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query ($query){
    global $conn;
    $result = mysqli_query ($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}

function tambah ($data){

        
    // htmlspecialchars untuk meghindari dari orang yang ngisi form menggunakan tag html (ngehack)
    $product = htmlspecialchars($data["product"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    
    // upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    global $conn;
    $query = "INSERT INTO product_elektronik Values
    (
      '','$product', '$nama', '$harga', '$kondisi', '$gambar'
    )";

    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);

}

function upload(){

    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah ada gambar yang diupload
    if ( $error == 4 ){
        echo "<script>
            alert ('pilih gambar terlebih dahulu!');
        </script>";
    
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode (".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
            alert ('yang anda upload bukan gambar!');
        </script>";
    
        return false;
    }

    // cek jika ukuranya terlalu besar
    if ($ukuranFile > 1000000){
        echo "<script>
            alert ('ukuran gambar terlalu besar!');
        </script>";
    
        return false;
    }

    // jika lolos pengecekan, maka gambar diupload!
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/product/' . $namaFileBaru);
    return $namaFileBaru;

}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM product_elektronik WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah ($data){
  
    // htmlspecialchars untuk meghindari dari orang yang ngisi form menggunakan tag html (ngehack)
    $id = $data["id"];
    $product = htmlspecialchars($data["product"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user klik tambah baru atau tidak
    if( $_FILES["gambar"]["error"] === 4 ){
        $gambar = $gambarLama;
    } else {  
        $gambar = upload();
    }

    global $conn;
    $query = "UPDATE product_elektronik SET
                product = '$product',
                nama = '$nama',
                harga = $harga,
                kondisi = '$kondisi',
                gambar = '$gambar'
             WHERE id = $id
                ";

    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);

}

function cari ($keyword){
    $query = "SELECT * FROM product_elektronik
              WHERE 
              product LIKE '%$keyword%' OR
              nama LIKE '%$keyword%' OR
              kondisi LIKE '%$keyword%' OR
              harga LIKE '%$keyword%'
              ";
    return query($query);
}

function registrasi ($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek apakah username sudah ada atau belum
    $result = mysqli_query ($conn, " SELECT username FROM admin WHERE username = '$username' ");

    if ( mysqli_fetch_assoc($result) ){
        echo " <script>
                    alert ('maaf username sudah ada!');
               </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2){
        echo "<script>
                alert ('konfirmasi password tidak sesuai');
              </script>";
        return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // menambahkan ke database
    mysqli_query($conn, "INSERT INTO admin VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}



?>