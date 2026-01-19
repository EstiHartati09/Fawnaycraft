<?php
require_once "models/Produk.php";

class TerlarisController {

    public function index() {
        $produk = Produk::terlaris();
        require "views/terlaris/index.php";
    }
}