<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Produk - Fawnaycraft</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
<div class="top-area"></div>
<div class="judul">
    <h2><?= $judul ?? 'PRODUK'; ?></h2>
</div>

<div class="produk">
<?php if (!empty($produk)) : ?>
    <?php foreach ($produk as $p) : ?>
        <a href="index.php?page=detail-produk&id=<?= $p['id_produk'] ?>" class="produk-card">

            <!-- GAMBAR -->
            <div class="foto">
                <?php if (!empty($p['gambar'])): ?>
                    <img src="public/images/<?= $p['gambar'] ?>" alt="<?= $p['nama_produk'] ?>">
                <?php endif; ?>
            </div>

            <!-- TEKS (WAJIB DI SINI, LANGSUNG DALAM produk-card) -->
            <h4><?= $p['nama_produk']; ?></h4>
            <p>Rp <?= number_format($p['harga']); ?></p>
            <small>Terjual <?= $p['terjual']; ?></small>

        </a>
    <?php endforeach; ?>
<?php else : ?>
    <p style="text-align:center">Produk belum tersedia</p>
<?php endif; ?>
</div>




</body>
</html>
