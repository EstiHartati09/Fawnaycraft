<?php
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<h2 class="admin-title">TAMBAH PRODUK</h2>

<form action="index.php?page=simpan-produk" 
      method="POST" 
      enctype="multipart/form-data"
      class="admin-form">

    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" required>
    </div>

    <div class="form-group">
    <label>Kategori</label>
    <select name="id_kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="1">Gantungan Kunci</option>
        <option value="2">Tas</option>
        <option value="3">Buket</option>
    
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori'] ?>">
                <?= $k['nama_kategori'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" required>
    </div>

    <div class="form-group">
        <label>Terjual</label>
        <input type="number" name="terjual" value="0">
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="4"></textarea>
    </div>

    <div class="form-group">
        <label>Gambar Produk</label>
        <input type="file" name="gambar" accept="image/*">
    </div>

    <button type="submit" class="btn-save">
        SIMPAN
    </button>

</form>
