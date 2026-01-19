<?php
// tampilkan seluruh home user TANPA diubah
require "views/home.php";
?>

<hr style="margin:60px 0">

<!-- ================= CRUD ADMIN ================= -->
<h2 class="admin-title">PRODUK</h2>

<div class="admin-grid">
<?php foreach ($produk as $p): ?>
    <div class="admin-card">

        <a href="index.php?page=hapus-produk&id=<?= $p['id_produk'] ?>"
           class="btn-close">×</a>

        <?php if (!empty($p['gambar']) && file_exists("public/images/".$p['gambar'])): ?>
            <img src="public/images/<?= $p['gambar'] ?>">
        <?php else: ?>
            <div class="img-placeholder">Tidak ada gambar</div>
        <?php endif; ?>

        <h4><?= $p['nama_produk'] ?></h4>
        <p>Rp <?= number_format($p['harga']) ?></p>

        <a href="index.php?page=edit-produk&id=<?= $p['id_produk'] ?>"
           class="btn-edit">Edit</a>
    </div>
<?php endforeach; ?>
</div>

<hr style="margin:70px 0">

<h2 class="admin-title">TERLARIS</h2>

<div class="admin-grid">
<?php foreach ($terlaris as $p): ?>
    <div class="admin-item">

        <div class="admin-card">

            <!-- HAPUS -->
            <a href="index.php?page=hapus-produk&id=<?= $p['id_produk'] ?>"
               class="btn-close"
               onclick="return confirm('Hapus produk ini?')">×</a>

            <!-- GAMBAR -->
            <?php if (!empty($p['gambar']) && file_exists("public/images/".$p['gambar'])): ?>
                <img src="public/images/<?= $p['gambar'] ?>">
            <?php else: ?>
                <div class="img-placeholder">No Image</div>
            <?php endif; ?>

            <p class="admin-nama"><?= $p['nama_produk'] ?></p>
            <p class="admin-harga">Rp <?= number_format($p['harga']) ?></p>

        </div>

        <!-- EDIT -->
        <a href="index.php?page=edit-produk&id=<?= $p['id_produk'] ?>"
           class="btn-edit">Edit</a>

    </div>
<?php endforeach; ?>
</div>


<div class="admin-add">
    <a href="index.php?page=tambah-produk" class="btn-add">
        Tambah Produk
    </a>
</div>
