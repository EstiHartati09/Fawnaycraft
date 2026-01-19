<?php
require_once "config/database.php";

class Kategori {

    public static function all()
    {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM kategori");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
