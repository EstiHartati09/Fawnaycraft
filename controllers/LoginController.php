<?php
require_once "config/database.php";

class LoginController {

    public function login() {
        global $conn;
        session_start();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn,
            "SELECT * FROM admin 
             WHERE username='$username' AND password='$password'"
        );

        if (mysqli_num_rows($query) > 0) {
            $_SESSION['admin'] = true;
            header("Location: index.php?page=admin-produk");
            exit;
        } else {
            echo "Login gagal";
        }

        session_start();

        if ($admin) {
            $_SESSION['admin'] = true;
            header("Location: index.php?page=admin-produk");
            exit;
        }
  
    }
}
