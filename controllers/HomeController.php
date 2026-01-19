<?php
require_once "models/produk.php";

class HomeController {

    // HOME USER (SUDAH ADA)
    public function index()
{
    if (!empty($_GET['keyword'])) {
        $produk = Produk::search($_GET['keyword']);
    } else {
        $produk = Produk::all();
    }

    require "views/home.php";
}


    //HOME ADMIN//
    public function adminHome()
    {
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?page=login");
        exit;
    }

    require_once "models/Produk.php";
    $produk = Produk::all();
    $terlaris = Produk::terlaris();

    $view = "views/admin/home.php";
    require "views/layout/admin.php";
    }


}
