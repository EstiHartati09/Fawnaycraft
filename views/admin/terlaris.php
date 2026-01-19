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

<h2 class="admin-title">PRODUK TERLARIS</h2>

<div class="admin-grid">

<?php if (!empty($produk)): ?>
    <?php foreach ($produk as $p): ?>
        <div class="admin-card">

            
                
            

            <!-- GAMBAR -->
            <?php if (!empty($p['gambar'])): ?>
                <img src="public/images/<?= $p['gambar'] ?>" alt="<?= $p['nama_produk'] ?>">
            <?php endif; ?>

            <!-- INFO -->
            <h4><?= $p['nama_produk'] ?></h4>
            <p><strong><?= $p['terjual'] ?></strong> terjual</p>

            <!-- EDIT -->
            <a href="index.php?page=edit-terlaris&id=<?= $p['id_produk'] ?>"
               class="btn-edit">
               Edit
            </a>

        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p style="text-align:center;">Belum ada data terlaris</p>
<?php endif; ?>

</div>
