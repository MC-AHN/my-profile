<?php
session_start();

$usernameBenar = "admin";
$passwordBenar = "123456";
$message = "";
$login = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == $usernameBenar && $password == $passwordBenar) {
        $login = true;
        $_SESSION["username"] = $username;
        $message = "Login Berhasil. Selamat Datang " . htmlspecialchars($username) . "!";
    } else {
        $message = "Username atau password salah.";
    }
}

include 'partial/meta.php';
include 'partial/nav.php';

?>

        <div class="login">
            <div class="container">
                <h2>Login Page</h2>

                <?php if ($message != "") : ?>
                    <div class="alert <?php echo $login ? 'alert success' : 'alert error'; ?>">
                        <?php echo $message; ?>
                    </div>
                <?php endif;?>

                <?php if (!$login) : ?>
                    <form class="form" action="login.php" method="POST">
                        <div class="input-form">
                            <label for="username">Username</label>
                            <input name="username" type="text">
                        </div>
                        
                        <div class="input-form">
                            <label for="password">Password</label>
                            <input name="password" type="password">
                        </div>

                        <button type="submit" class="btn-login">Login</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

<?php include 'partial/footer.php'?>