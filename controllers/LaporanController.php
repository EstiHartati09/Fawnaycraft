<?php
require_once "models/Laporan.php";

class LaporanController {

    public function index()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $tipe = $_GET['tipe'] ?? '';

        if ($tipe === 'bulanan') {

            // 🔹 LAPORAN BULAN INI
            $awal  = date('Y-m-01');
            $akhir = date('Y-m-t');

        } elseif ($tipe === 'tahunan') {

            // 🔹 LAPORAN TAHUN INI
            $awal  = date('Y-01-01');
            $akhir = date('Y-12-31');

        } else {

            // 🔹 TANGGAL MANUAL
            $awal  = $_GET['awal'] ?? date('Y-m-01');
            $akhir = $_GET['akhir'] ?? date('Y-m-d');
        }


        // 🔹 DATA LAPORAN (TABEL)
        $laporan = Laporan::getLaporan($awal, $akhir);

        // 🔹 SUMMARY (PAKAI METHOD BARU)
        $summary = Laporan::summary($awal, $akhir);


        // 🔹 (OPSIONAL) DATA TAMBAHAN
        $laporan_bulanan = Laporan::perBulan();
        $laporan_mingguan = Laporan::perMinggu();
        $laporan_tahunan = Laporan::perTahun();

        $view = "views/admin/laporan.php";
        require "views/layout/admin.php";
    }
}
