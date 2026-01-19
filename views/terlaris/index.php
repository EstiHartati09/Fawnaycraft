<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terlaris - Fawnaycraft</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>

<!-- JUDUL -->
<h2 class="judul-teks">TERLARIS</h2>

<!-- TERLARIS -->
<div class="terlaris-wrapper">

    <?php $no = 1; ?>
    <?php foreach ($produk as $p): ?>

        <!-- 🔥 LINK MEMBUNGKUS CARD -->
        <a href="index.php?page=detail-produk&id=<?= $p['id_produk'] ?>" class="produk-link">

            <div class="terlaris-card">
                
                <!-- BADGE -->
                <div class="badge">
                    <?= $no++; ?>
                </div>

                <!-- GAMBAR (DESAIN TETAP) -->
                <!-- GAMBAR (DESAIN TETAP) -->
                <div class="foto">
                    <?php if (!empty($p['gambar'])): ?>
                        <img src="public/images/<?= $p['gambar']; ?>" alt="<?= $p['nama_produk']; ?>">
                    <?php else: ?>
                        <div class="img-placeholder">No Image</div>
                    <?php endif; ?>
                </div>

                <!-- NAMA -->
                <p class="nama-produk"><?= $p['nama_produk']; ?></p>

                <!-- HARGA -->
                <p class="harga-produk">Rp. <?= number_format($p['harga']); ?></p>

            </div>

        </a>

    <?php endforeach; ?>

</div>

</body>
</html>
