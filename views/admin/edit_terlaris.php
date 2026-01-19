<?php
// proteksi admin
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<!-- MENU ADMIN -->
<div class="admin-menu">
    <a href="index.php?page=admin-produk">PRODUK</a>
    <a href="index.php?page=admin-terlaris" class="active">TERLARIS</a>
    <a href="index.php?page=laporan">LAPORAN</a>
</div>

<h2 class="admin-title">EDIT TERLARIS</h2>

<form action="index.php?page=update-terlaris"
      method="POST"
      class="admin-form"
      style="max-width:420px;margin:0 auto;">

    <!-- ID PRODUK -->
    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">

    <!-- NAMA PRODUK -->
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text"
               value="<?= $produk['nama_produk'] ?>"
               disabled>
    </div>

    <!-- JUMLAH TERJUAL -->
    <div class="form-group">
        <label>Jumlah Terjual</label>
        <input type="number"
               name="terjual"
               value="<?= $produk['terjual'] ?>"
               min="0"
               required>
    </div>

    <!-- SIMPAN -->
    <button type="submit" class="btn-save">
        SIMPAN
    </button>

</form>
