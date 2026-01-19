<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Fawnaycraft</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>

<!-- AREA ATAS -->
<div class="top-area"></div>

<!-- SLIDER CERITA -->
<div class="slider">

    <div class="slide active">
        <h2>RAJUTAN BERCERITA</h2>
        <p>
            Semua berawal dari satu gulungan benang dan sepasang jarum rajut.
            Dari sana, kami mulai merangkai simpul-simpul kecil yang perlahan
            berubah menjadi karya penuh makna.
        </p>
    </div>

    <div class="slide">
        <h2>CARANYA DIA TETAP IMUT</h2>
        <p>
            Agar rajutan tetap terlihat imut dan awet, hindari mencuci dengan
            mesin. Gunakan air dingin dan sabun lembut.
        </p>
    </div>

    <!-- SATU TOMBOL SAJA -->
    <button class="slide-btn right" onclick="toggleSlide()">›</button>

</div>


    <!-- TOMBOL NAV -->
    <button class="nav prev" onclick="prevSlide()">‹</button>
    <button class="nav next" onclick="nextSlide()">›</button>

    <!-- INDIKATOR TUNGGAL -->
    <div class="single-indicator"></div>

</div>


    <!-- TOMBOL -->
    <button class="nav prev" onclick="prevSlide()">‹</button>
    <button class="nav next" onclick="nextSlide()">›</button>

</div>



<!-- SEARCH -->
<div class="search">
    <form action="index.php" method="get">
        <input type="hidden" name="page" value="home">
        <input 
        type="text" 
        name="keyword" 
        placeholder="Cari Nama Produk"
        value="<?= $_GET['keyword'] ?? '' ?>">
        <button type="submit">Cari</button>
    </form>
</div>


<!-- MENU KOTAK -->
<div class="menu-kotak">
    <a href="index.php?page=produk" class="menu-item">PRODUK</a>
    <a href="index.php?page=kategori" class="menu-item">KATEGORI</a>
    <a href="index.php?page=terlaris" class="menu-item">TERLARIS</a>
</div>

<!-- PRODUK -->
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


<script>
    let slides = document.querySelectorAll('.slide');
    let index = 0;
    const btn = document.querySelector('.slide-btn');

    function showSlide(i) {
        slides.forEach(slide => slide.classList.remove('active'));
        slides[i].classList.add('active');

        // pindah posisi tombol
        btn.classList.remove('left', 'right');
        if (i === 0) {
            btn.classList.add('right'); // Rajutan Bercerita
            btn.innerHTML = '›';
        } else {
            btn.classList.add('left');  // Caranya Dia Tetap Imut
            btn.innerHTML = '‹';
        }
    }

    function toggleSlide() {
        index = (index + 1) % slides.length;
        showSlide(index);
    }

    // Auto slide (opsional, bisa dihapus kalau tidak mau)
    setInterval(toggleSlide, 2000);

    // Init
    showSlide(index);
</script>


</body>
</html>
