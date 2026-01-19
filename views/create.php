<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <div class="container">
        <h2>Tambah Data Produk</h2>

        <a class="btn" href="index.php?page=produk">Kembali</a>

        <form action="index.php?page=simpan-produk" method="POST">

            <input type="text" name="nama_produk" placeholder="Nama Produk" required>

            <input type="number" name="id_kategori" placeholder="ID Kategori" required>

            <input type="number" name="harga" placeholder="Harga Produk" required>

            <input type="number" name="stok" placeholder="Stok Produk" required>

            <input type="text" name="warna" placeholder="Warna Produk" required>

            <textarea name="deskripsi" placeholder="Deskripsi Produk" required></textarea>

            <select name="terlaris" required>
                <option value="0">Tidak Terlaris</option>
                <option value="1">Terlaris</option>
            </select>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
