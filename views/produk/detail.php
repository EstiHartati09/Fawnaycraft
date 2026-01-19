<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $produk['nama_produk']; ?> - Fawnaycraft</title>
    <link rel="stylesheet" href="public/style.css">

    <!-- CSS POPUP (DISATUKAN) -->
    <style>
        .pesan-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .pesan-popup {
            background: #7b1e1e;
            padding: 24px;
            width: 320px;
            border-radius: 14px;
            text-align: center;
            position: relative;
        }

        .close-popup {
            position: absolute;
            top: 10px;
            right: 14px;
            font-size: 22px;
            color: #fff;
            cursor: pointer;
        }

        .btn-chat {
            display: block;
            background: #fff;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 12px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-wa { color: #25D366; }
        .btn-ig { color: #C13584; }

        /* ===== FIX GAMBAR DETAIL PRODUK ===== */
    .detail-image {
        max-width: 350px;
    }

    .detail-image img {
        width: 100% !important;
        max-width: 300px !important;
        height: auto !important;
        object-fit: contain !important;
        display: block;
        margin: auto;
        border-radius: 10px;
    }
    </style>
</head>
<body>

<header class="navbar">
    <h3>FAWNAY<br>CRAFT</h3>
    <nav>
        <a href="index.php?page=produk">Produk</a>
        <a href="index.php?page=kategori">Kategori</a>
        <a href="index.php?page=terlaris">Terlaris</a>
    </nav>
</header>

<!-- ================= DETAIL PRODUK ================= -->
<div class="detail-container">

    <div class="detail-image">
        <?php if (!empty($produk['gambar'])): ?>
            <img src="public/images/<?= $produk['gambar'] ?>">
        <?php else: ?>
            <div class="img-placeholder">Tidak ada gambar</div>
        <?php endif; ?>
    </div>

    <div class="detail-info">

        <h2><?= strtoupper($produk['nama_produk']) ?></h2>
        <small>PRE ORDER (7 HARI)</small>

        <p class="terjual"><?= $produk['terjual'] ?> terjual</p>

        <h3>Rp. <?= number_format($produk['harga']) ?></h3>

        <p class="deskripsi">
            <?= nl2br($produk['deskripsi']) ?>
        </p>

        <p class="spesifikasi">
            <strong>Spesifikasi:</strong><br>
            <?= nl2br($produk['spesifikasi'] ?? '-') ?>
        </p>

        <div class="varian">
        <span>Pilih Varian Warna</span><br>
        <button type="button" onclick="pilihVarian('Merah')">Merah</button>
        <button type="button" onclick="pilihVarian('Kuning')">Kuning</button>
        </div>


        <!-- TOMBOL PESAN -->
        <button 
        type="button" 
        class="btn-pesan" 
        id="btnPesan"
        onclick="openPesanPopup()">
            Pesan Sekarang
        </button>

    </div>
</div>

<!-- ================= POPUP PESAN ================= -->
<div id="pesanPopup" class="pesan-overlay">
    <div class="pesan-popup">
        <span class="close-popup" onclick="closePesanPopup()">×</span>

        <a href="#" onclick="kirimWA()" class="btn-chat btn-wa">
            Pesan Via WhatsApp
        </a>

        <a href="#" class="btn-chat btn-ig" onclick="kirimIG()">
        Pesan Via Instagram
    </a>

    </div>
</div>

<!-- ================= JS POPUP ================= -->
<script>

let varianDipilih = "";

function pilihVarian(varian) {
    varianDipilih = varian;

    // AKTIFKAN tombol pesan
    document.getElementById("btnPesan").disabled = false;

    // efek visual (tetap sederhana)
    document.querySelectorAll('.varian button').forEach(btn => {
        btn.style.border = "1px solid #ccc";
    });
    event.target.style.border = "2px solid #000";
}

function openPesanPopup() {

    if (varianDipilih === "-" || varianDipilih === "") {
        alert("Silakan pilih varian warna terlebih dahulu 😊");

        // fokuskan user ke area varian
        document.querySelector('.varian').scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });

        return;
    }

    document.getElementById("pesanPopup").style.display = "flex";
}


function closePesanPopup() {
    document.getElementById("pesanPopup").style.display = "none";
}


function kirimWA() {

    let produk = "<?= $produk['nama_produk'] ?>";

    let pesan =
`Halo kak 👋
Saya mau pesan:

Nama Produk : ${produk}
Varian      : ${varianDipilih}

Jika ingin ganti varian :
-

Nama Lengkap :
Alamat :
Jumlah Produk :
Metode Pembayaran :`;

    let url = "https://wa.me/6283129799446?text=" + encodeURIComponent(pesan);
    window.open(url, "_blank");
}

function kirimIG() {

    let produk = "<?= $produk['nama_produk'] ?>";

    let pesan =
`Halo kak 👋
Saya mau pesan:

Nama Produk : ${produk}
Varian      : ${varianDipilih}

Jika ingin ganti varian :
-

Nama Lengkap :
Alamat :
Jumlah Produk :
Metode Pembayaran :`;

    let url = "https://www.instagram.com/direct/new/?text=" + encodeURIComponent(pesan);
    window.open(url, "_blank");
}


</script>

</body>
</html>
