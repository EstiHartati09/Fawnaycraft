<?php
require_once "models/Produk.php";

class DetailProdukController {

    public function index() {

        // ❗ HARUS ADA ID
        if (!isset($_GET['id'])) {
            echo "Produk tidak ditemukan";
            return;
        }

        $id_produk = $_GET['id'];

        // 🔥 INI INTINYA
        $produk = Produk::find($id_produk);

        if (!$produk) {
            echo "Produk tidak ditemukan";
            return;
        }

        require "views/produk/detail.php";
    }
}
