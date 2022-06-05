<?php
session_start();
require "db.php";
global $pdo;

if (isset($_SESSION["username"])) {
    header("Location: ../index.php");
    die();
}

function showRegForm($message = "", $username = "") {
    ?>
    <!DOCTYPE HTML>
    <html lang="en">
    <head>
        <title>Login | Knit It</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/stylesheet.css">
        <script src="https://kit.fontawesome.com/e84fe85387.js" crossorigin="anonymous"></script>
    </head>

    <body>
    <?php require "../php_scripts/navbar_in_directory.php"; ?>

    <div class="login-register-form">
        <h2>Login to Knit it</h2>

        <?php if($message !== "") { ?><p class="warning"><?php echo $message; ?></p><?php } ?>

        <form method="post">
            <label for="uname_reg1">Username or email</label>
            <input id="uname_reg1" type="text" name="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES + ENT_HTML5); ?>">
            <label for="pass">Password</label>
            <input id="pass" name="password" type="password">
            <input type="submit" value="Login" id="reg_btn">
        </form>

        <p>Login with</p>

        <button onclick="alert('Not implemented.');" class="twitter"><i class="fab fa-twitter"></i> Twitter</button>
    </div>
    </body>
    </html>
    <?php
}

if (isset($_POST["username"]) and isset($_POST["password"])) {
    $un = strtolower($_POST["username"]);
    $pw = strtolower($_POST["password"]);

    $ppi = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    if ($ppi->execute([$un, $un])) {
        if ($ppi->rowCount() > 0) {
            $p2s = $ppi->fetch();
            if (password_verify($pw,$p2s["password"])) {
                $_SESSION["username"] = $p2s["username"];
                header("Location: ../index.php");
                die();
            } else {
                showRegForm("Login or password incorrect.", $un);
                die();
            }
        } else {
            showRegForm("Login or password incorrect.", $un);
            die();
        }
    } else {
        showRegForm("Couldn't process. Please try again later.", $un);
        die();
    }
} else {
    showRegForm();
}