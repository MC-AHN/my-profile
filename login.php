<?php
session_start();

$usernameBenar = "admin";
$passwordBenar = "123456";
$pesan = "";
$berhasilLogin = false;

if ($_SERVER("REQUESET_METHOD") == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == $usernameBenar && $password == $passwordBenar) {
        $berhasilLogin = true;
        $_SESSION["username"] = $username;
        $pesan = "Login Berhasil. Selamat Datang" . htmlspecialchars($username) . "!";
    } else {
        $pesan = "Username atau password salah.";
    }
}
?>
