<?php
session_start();

if (isset($_SESSION['login'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" action="cek_login.php" method="post">
                <h2>Login</h2>
                <input type="text" name="username" placeholder="username" />
                <input type="password" name="password" placeholder="password" />
                <button>login</button>
                <p class="message">Sudahkah Mendaftar? <a href="Register.php">Buat Akun Disini</a></p>
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>