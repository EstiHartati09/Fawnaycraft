<?php
// proteksi sederhana (opsional tapi disarankan)
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<div class="admin-container">

    <div class="admin-menu">
    <a href="index.php?page=admin-produk" class="menu-item active">PRODUK</a>
    <a href="index.php?page=terlaris" class="menu-item">TERLARIS</a>
    <a href="index.php?page=laporan" class="menu-item">LAPORAN</a>
    </div>


    <div class="admin-grid">

    <?php if (!empty($produk)): ?>
        <?php foreach ($produk as $p): ?>
            <div class="admin-card">

                <!-- TOMBOL HAPUS -->
                <a href="index.php?page=hapus-produk&id=<?= $p['id_produk'] ?>" 
                   class="btn-close"
                   onclick="return confirm('Hapus produk ini?')">×</a>

                <!-- GAMBAR -->
                <?php if (!empty($p['gambar']) && file_exists("public/images/".$p['gambar'])): ?>
                <img src="public/images/<?= $p['gambar'] ?>" alt="<?= $p['nama_produk'] ?>">
                <?php else: ?>
                    <div class="img-placeholder">
                        Tidak ada gambar
                    </div>
                <?php endif; ?>
                <!-- NAMA PRODUK -->
                <h4><?= htmlspecialchars($p['nama_produk']) ?></h4>

                <!-- HARGA -->
                <p>Rp. <?= number_format($p['harga']) ?></p>

                <!-- EDIT -->
                <a href="index.php?page=edit-produk&id=<?= $p['id_produk'] ?>" 
                   class="btn-edit">Edit</a>

            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Belum ada produk.</p>
    <?php endif; ?>
</div>

<div class="admin-add">
    <a href="index.php?page=tambah-produk" class="btn-add">Tambah</a>
</div>

</div>
