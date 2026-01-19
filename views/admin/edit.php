<?php
// proteksi admin
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<div class="admin-form-container">

    <h2 class="admin-title">EDIT PRODUK</h2>

<form action="index.php?page=update-produk" method="POST" enctype="multipart/form-data"
      style="max-width:500px;margin:0 auto;">

    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">

    <label>Nama Produk</label>
    <input type="text" name="nama_produk"
           value="<?= $produk['nama_produk'] ?>" required>

    <label>Harga</label>
    <input type="number" name="harga"
           value="<?= $produk['harga'] ?>" required>

    <label>Terjual</label>
    <input type="number" name="terjual"
           value="<?= $produk['terjual'] ?>" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" rows="4" required><?= $produk['deskripsi'] ?></textarea>

    <label>Kategori</label>
    <select name="id_kategori" required>
        <option value="1" <?= $produk['id_kategori']==1?'selected':'' ?>>Gantungan Kunci</option>
        <option value="2" <?= $produk['id_kategori']==2?'selected':'' ?>>Tas</option>
        <option value="3" <?= $produk['id_kategori']==3?'selected':'' ?>>Buket Bunga</option>
    </select>

    <label>Gambar Produk</label>
    <input type="file" name="foto">

    <small>Gambar saat ini:</small><br>
    <?php if (!empty($produk['foto'])): ?>
        <img src="public/images/<?= $produk['foto'] ?>" width="120">
    <?php endif; ?>

    <br><br>

    <button type="submit" class="btn-add">Simpan</button>
</form>

<script>
function previewEdit(input) {
    const preview = document.getElementById('previewEdit');
    const file = input.files[0];

    if (file) {
        preview.style.display = "block";
        preview.src = URL.createObjectURL(file);
    }
}
</script>

