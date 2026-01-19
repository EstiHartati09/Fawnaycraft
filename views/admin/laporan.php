<?php
// proteksi admin
if (!isset($_SESSION['admin'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<!-- ================= TAB MENU ADMIN ================= -->
<div class="admin-tab">
    <a href="index.php?page=admin-produk">PRODUK</a>
    <a href="index.php?page=admin-terlaris">TERLARIS</a>
    <a href="index.php?page=laporan" class="active">LAPORAN</a>
</div>

<!-- ================= JUDUL ================= -->
<h2 class="admin-title">LAPORAN</h2>

<!-- ================= FILTER TANGGAL ================= -->
<form method="GET" class="laporan-filter">
    <input type="hidden" name="page" value="laporan">

    Periode :
    <input type="date" name="awal" value="<?= $_GET['awal'] ?? date('Y-m-01') ?>">
    -
    <input type="date" name="akhir" value="<?= $_GET['akhir'] ?? date('Y-m-d') ?>">

    <select name="tipe">
        <option value="">Tanggal Manual</option>
        <option value="bulanan" <?= ($_GET['tipe'] ?? '')=='bulanan'?'selected':'' ?>>Per Bulan</option>
        <option value="tahunan" <?= ($_GET['tipe'] ?? '')=='tahunan'?'selected':'' ?>>Per Tahun</option>
    </select>

    <button type="submit">Filter</button>
</form>


<!-- ================= RINGKASAN ================= -->
<div class="laporan-summary">

    <div class="summary-box">
        <p>Total Produk</p>
        <h3><?= $summary['total_produk'] ?? 0 ?></h3>
    </div>

    <div class="summary-box">
        <p>Total Terjual</p>
        <h3><?= $summary['total_terjual'] ?? 0 ?></h3>
    </div>

    <div class="summary-box">
        <p>Pendapatan</p>
        <h3>Rp <?= number_format($summary['pendapatan'] ?? 0) ?></h3>
    </div>

</div>

<!-- ================= TABEL LAPORAN ================= -->
<table class="laporan-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Terjual</th>
            <th>Pendapatan</th>
        </tr>
    </thead>
    <tbody>

        <?php if (!empty($laporan)): ?>
            <?php $no = 1; foreach ($laporan as $l): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $l['nama_produk'] ?></td>
                    <td><?= $l['nama_kategori'] ?></td>
                    <td><?= $l['terjual'] ?></td>
                    <td>Rp <?= number_format($l['pendapatan']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center;">
                    Tidak ada data pada periode ini
                </td>
            </tr>
        <?php endif; ?>

    </tbody>
</table>

<h3 style="margin-top:50px">Grafik Penjualan</h3>

<canvas id="grafikBulanan" height="120"></canvas>
<canvas id="grafikTahunan" height="120" style="margin-top:40px"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
/* ================== GRAFIK BULANAN ================== */
const bulananLabels = <?= json_encode(array_column($grafikBulanan,'tanggal')) ?>;
const bulananData   = <?= json_encode(array_column($grafikBulanan,'total')) ?>;

new Chart(document.getElementById('grafikBulanan'), {
    type: 'line',
    data: {
        labels: bulananLabels,
        datasets: [{
            label: 'Penjualan Harian',
            data: bulananData,
            borderColor: '#7b1e1e',
            fill: false
        }]
    }
});

/* ================== GRAFIK TAHUNAN ================== */
const tahunanLabels = <?= json_encode(array_map(
    fn($b) => 'Bulan '.$b,
    array_column($grafikTahunan,'bulan')
)) ?>;

const tahunanData = <?= json_encode(array_column($grafikTahunan,'total')) ?>;

new Chart(document.getElementById('grafikTahunan'), {
    type: 'bar',
    data: {
        labels: tahunanLabels,
        datasets: [{
            label: 'Penjualan Bulanan',
            data: tahunanData,
            backgroundColor: '#f2b27b'
        }]
    }
});
</script>
