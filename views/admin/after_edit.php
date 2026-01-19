<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>After Edit - Fawnaycraft</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<!-- HEADER GAMBAR -->
<div class="header-img"></div>

<h2 class="title-center">PRODUK</h2>
<h3 class="subtitle-center">TERLARIS</h3>

<div class="produk-container">

<?php if (!empty($produk)): ?>
<div class="produk-wrapper">
    <?php foreach ($produk as $p): ?>
        <div class="card">
            <img src="public/images/<?= $p['foto']; ?>">
            <h4><?= $p['nama_produk']; ?></h4>
            <p>Rp. <?= number_format($p['harga']); ?></p>
            <a href="index.php?page=edit-produk&id=<?= $p['id']; ?>" class="btn-edit">Edit</a>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

</div>

</body>
</html>
