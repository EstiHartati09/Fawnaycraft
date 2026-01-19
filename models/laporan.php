<?php
require_once "config/database.php";

class Laporan {

    /* ===============================
       DATA LAPORAN (TABEL)
       =============================== */
    public static function getLaporan($awal, $akhir)
    {
        global $conn;

        $awal  = mysqli_real_escape_string($conn, $awal);
        $akhir = mysqli_real_escape_string($conn, $akhir);

        $sql = "
            SELECT 
                p.nama_produk,
                k.nama_kategori,
                p.terjual,
                (p.terjual * p.harga) AS pendapatan
            FROM produk p
            JOIN kategori k ON p.id_kategori = k.id_kategori
            WHERE DATE(p.tanggal_dibuat) BETWEEN '$awal' AND '$akhir'
            ORDER BY p.terjual DESC
        ";

        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* ===============================
       SUMMARY (UNTUK BOX ATAS)
       =============================== */
    public static function summary($awal, $akhir)
    {
        global $conn;

        $awal  = mysqli_real_escape_string($conn, $awal);
        $akhir = mysqli_real_escape_string($conn, $akhir);

        $sql = "
            SELECT 
                COUNT(*) AS total_produk,
                SUM(terjual) AS total_terjual,
                SUM(terjual * harga) AS pendapatan
            FROM produk
            WHERE DATE(tanggal_dibuat) BETWEEN '$awal' AND '$akhir'
        ";

        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    /* ===============================
       LAPORAN BULANAN
       =============================== */
    public static function perBulan()
    {
        global $conn;

        $sql = "
            SELECT 
                DATE_FORMAT(tanggal_dibuat, '%Y-%m') AS periode,
                SUM(terjual) AS total_terjual,
                SUM(terjual * harga) AS pendapatan
            FROM produk
            GROUP BY DATE_FORMAT(tanggal_dibuat, '%Y-%m')
            ORDER BY periode DESC
        ";

        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* ===============================
       LAPORAN MINGGUAN
       =============================== */
    public static function perMinggu()
    {
        global $conn;

        $sql = "
            SELECT 
                YEAR(tanggal_dibuat) AS tahun,
                WEEK(tanggal_dibuat) AS minggu,
                SUM(terjual) AS total_terjual,
                SUM(terjual * harga) AS pendapatan
            FROM produk
            GROUP BY YEAR(tanggal_dibuat), WEEK(tanggal_dibuat)
            ORDER BY tahun DESC, minggu DESC
        ";

        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* ===============================
       LAPORAN TAHUNAN
       =============================== */
    public static function perTahun()
    {
        global $conn;

        $sql = "
            SELECT 
                YEAR(tanggal_dibuat) AS tahun,
                SUM(terjual) AS total_terjual,
                SUM(terjual * harga) AS pendapatan
            FROM produk
            GROUP BY YEAR(tanggal_dibuat)
            ORDER BY tahun DESC
        ";

        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

        /* ===============================
       GRAFIK TAHUNAN (PER BULAN)
       =============================== */
    public static function grafikTahunan($awal, $akhir)
    {
        global $conn;

        $awal  = mysqli_real_escape_string($conn, $awal);
        $akhir = mysqli_real_escape_string($conn, $akhir);

        $sql = "
            SELECT 
                MONTH(tanggal_dibuat) AS bulan,
                SUM(terjual) AS total
            FROM produk
            WHERE DATE(tanggal_dibuat) BETWEEN '$awal' AND '$akhir'
            GROUP BY MONTH(tanggal_dibuat)
            ORDER BY MONTH(tanggal_dibuat)
        ";

        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public static function grafikBulanan($awal, $akhir)
    {
        global $conn;

        $sql = "
            SELECT 
                DATE(tanggal_dibuat) AS tanggal,
                SUM(terjual) AS total
            FROM produk
            WHERE DATE(tanggal_dibuat) BETWEEN '$awal' AND '$akhir'
            GROUP BY DATE(tanggal_dibuat)
            ORDER BY tanggal ASC
        ";

        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}
