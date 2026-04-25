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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>