<?php
require_once "models/Produk.php";

class ProdukController {

    public function index() {

    // 🔥 JIKA ADA FILTER KATEGORI
    if (isset($_GET['kategori'])) {
        $id_kategori = $_GET['kategori'];
        $produk = Produk::byKategori($id_kategori);
    } else {
        // 🔥 JIKA TIDAK ADA FILTER
        $produk = Produk::all();
    }

    require "views/produk/index.php";
}

    // =========================
    // PRODUK UNTUK ADMIN
    // =========================
    public function adminIndex()
    {
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?page=login");
        exit;
    }

    require_once "models/Produk.php";
    $produk = Produk::all();

    $view = "views/admin/produk.php";
    require "views/layout/admin.php";
    }

    // method lain (create, store, edit, dll)
    public function create()
    {
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?page=login");
        exit;
    }

    $view = "views/admin/tambah.php";
    require "views/layout/admin.php";
    }

    // ✅ INI YANG TADI ERROR
    public function store() {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        Produk::create($_POST, $_FILES);

        // balik ke admin produk
        header("Location: index.php?page=admin-produk");
        exit;
    }


    // ================= HAPUS =================
    public function delete() {
        $id = $_GET['id'];
        Produk::delete($id);
        header("Location: index.php?page=admin-produk");
    }

    public function edit()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        require_once "models/Produk.php";
        $produk = Produk::find($_GET['id']);

        $view = "views/admin/edit.php";
        require "views/layout/admin.php";
    }

   public function update()
{
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?page=login");
        exit;
    }

    Produk::update($_POST, $_FILES);

    header("Location: index.php?page=admin-produk");
    exit;
}


 

}
