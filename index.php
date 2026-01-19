<?php
session_start();
require_once "config/database.php";

// ================== GET PAGE ==================
$page = $_GET['page'] ?? 'home';

// ================== LOGIN ==================
if ($page === 'login') {
    require "views/admin/login.php";
    exit;
}

if ($page === 'login-proses') {
    require_once "controllers/LoginController.php";
    (new LoginController)->login();
    exit;
}

// ================== ADMIN ==================
if ($page === 'admin-produk') {
    require_once "controllers/ProdukController.php";
    (new ProdukController)->adminIndex();
    exit;
}

if ($page === 'tambah-produk') {
    require_once "controllers/ProdukController.php";
    (new ProdukController)->create();
    
}

if ($page === 'simpan-produk') {
    require_once "controllers/ProdukController.php";
    (new ProdukController)->store();
    exit;
}

if ($page === 'edit-produk') {
    require_once "controllers/ProdukController.php";
    (new ProdukController)->edit();
    exit;
}

if ($page === 'update-produk') {
    require_once "controllers/ProdukController.php";
    (new ProdukController)->update();
    exit;
}

if ($page === 'hapus-produk') {
    require_once "controllers/ProdukController.php";
    (new ProdukController)->delete();
    exit;
}

if ($page === 'after-edit-produk') {
    require_once "controllers/ProdukController.php";
    (new ProdukController)->afterEdit();
    exit;
}

// ================== USER ==================
if ($page === 'home') {
    require_once "controllers/HomeController.php";
    (new HomeController)->index();
    exit;
}

if ($page === 'produk') {
    require_once "controllers/ProdukController.php";
    (new ProdukController)->index();
    exit;
}

if ($page === 'detail-produk') {
    require_once "controllers/DetailProdukController.php";
    (new DetailProdukController)->index();
    exit;
}

if ($page === 'kategori') {
    require_once "controllers/KategoriController.php";
    (new KategoriController)->index();
    exit;
}

if ($page === 'kategori-produk') {
    require_once "controllers/KategoriController.php";
    (new KategoriController)->show();
    exit;
}

if ($page === 'terlaris') {
    require_once "controllers/TerlarisController.php";
    (new TerlarisController)->index();
    exit;
}

// setelah login sukses
if ($page == 'admin-home') {
    require_once "controllers/HomeController.php";
    (new HomeController)->admin();
    exit;
}

if ($page == 'laporan') {
    require_once "controllers/LaporanController.php";
    (new LaporanController)->index();
    exit;
}




// ================== DEFAULT ==================
echo "404 - Halaman tidak ditemukan";
