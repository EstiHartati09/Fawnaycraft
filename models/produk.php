<?php
require_once "config/database.php";

class Produk {

    public static function all()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


    public static function byKategori($id_kategori) {
        global $conn;
        $id = mysqli_real_escape_string($conn, $id_kategori);
        $result = mysqli_query(
            $conn,
            "SELECT * FROM produk WHERE id_kategori = '$id'"
        );
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public static function terlaris() {
    global $conn;

    $query = "SELECT * FROM produk ORDER BY terjual DESC LIMIT 3";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public static function find($id) {
        global $conn;

        $id = mysqli_real_escape_string($conn, $id);
        $sql = "SELECT * FROM produk WHERE id_produk = '$id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die(mysqli_error($conn));
        }

        return mysqli_fetch_assoc($result);
    }

    public static function delete($id) {
    global $conn;
    $id = mysqli_query($conn, "DELETE FROM produk WHERE id_produk='$id'");
    }

    public static function update($data, $files)
{
    global $conn;

    $id       = $data['id_produk'];
    $nama     = $data['nama_produk'];
    $harga    = $data['harga'];
    $terjual  = $data['terjual'];
    $deskripsi = $data['deskripsi'];
    $id_kategori = $data['id_kategori'];

    // CEK GAMBAR ADA ATAU TIDAK
    if (!empty($files['gambar']['name'])) {

        $gambar = $files['gambar']['name'];
        move_uploaded_file(
            $files['gambar']['tmp_name'],
            "public/images/" .$foto
        );

        $sql = "UPDATE produk SET
                    nama_produk='$nama',
                    harga='$harga',
                    terjual='$terjual',
                    deskripsi='$deskripsi',
                    id_kategori='$id_kategori',
                    foto='$foto'
                WHERE id_produk='$id'";
    } else {

        // TANPA GANTI GAMBAR
        $sql = "UPDATE produk SET
                    nama_produk='$nama',
                    harga='$harga',
                    terjual='$terjual',
                    deskripsi='$deskripsi',
                    id_kategori='$id_kategori'
                WHERE id_produk='$id'";
    }

    mysqli_query($conn, $sql);
}



    public static function create($data, $file)
{
    global $conn;

    $nama  = $data['nama_produk'];
    $harga = $data['harga'];
    $terjual = $data['terjual'];
    $id_kategori = $data['id_kategori'];
    $deskripsi = $data['deskripsi'];

    $foto = $file['gambar']['name'];
move_uploaded_file($file['gambar']['tmp_name'], "public/images/".$gambar);

mysqli_query($conn, "
    INSERT INTO produk 
    (nama_produk, harga, terjual, id_kategori, deskripsi, gambar)
    VALUES 
    ('$nama','$harga','$terjual','$id_kategori','$deskripsi','$gambar')
");

}

public static function search($keyword)
{
    global $conn;

    $keyword = mysqli_real_escape_string($conn, $keyword);

    $query = "
        SELECT * FROM produk 
        WHERE nama_produk LIKE '%$keyword%'
        ORDER BY id_produk DESC
    ";

    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


}


