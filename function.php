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
    $gambar = htmlspecialchars($data["gambar"]);

    global $conn;
    $query = "INSERT INTO product_elektronik Values
    (
      '','$product', '$nama', '$harga', '$kondisi', '$gambar'
    )";

    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);

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
    $gambar = htmlspecialchars($data["gambar"]);

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


?>