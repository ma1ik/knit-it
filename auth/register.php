<?php
session_start();
require "db.php";
global $pdo;

if (isset($_SESSION["username"])) {
    header("Location: ../index.php");
    die();
}

function showRegForm($message = "", $username = "", $email = "") {
    ?>
    <!DOCTYPE HTML>
    <html lang="en">
    <head>
        <title>Register | Knit It</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>

    <body>
    <?php require "../php_scripts/navbar_in_directory.php"; ?>

    <div class="login-register-form">
        <h2>Register for Knit it</h2>

        <?php if($message !== "") { ?><p class="warning"><?php echo $message; ?></p><?php } ?>

        <form method="post">
            <label for="uname_reg1">Username</label>
            <input id="uname_reg1" type="text" name="username" pattern="[A-z0-9\-]{3,16}" value="<?php echo htmlspecialchars($username, ENT_QUOTES + ENT_HTML5); ?>" minlength="3" maxlength="16">
            <label for="email_reg1">Email</label>
            <input id="email_reg1" name="email" type="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES + ENT_HTML5); ?>">
            <label for="pass_one">Password</label>
            <input id="pass_one" name="password" type="password" minlength="8">
            <label for="pass_two">Confirm Password</label>
            <input id="pass_two" name="password_confirm" type="password" minlength="8">
            <input type="submit" value="Register" id="reg_btn">
        </form>
    </div>
    </body>
    </html>
        <?php
}

if (isset($_POST["username"]) and isset($_POST["password"]) and isset($_POST["email"]) and isset($_POST["password_confirm"])) {
    $un = strtolower($_POST["username"]);
    $pw = $_POST["password"];
    $pwc = $_POST["password_confirm"];
    $em = strtolower($_POST["email"]);

    if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        showRegForm("Email is Invalid", $un, $em);
        die();
    }

    if (!preg_match("/^[a-z0-9\-]{3,16}$/i", $un)) {
        showRegForm("Your username must be 3-16 characters and only contain Alphanumeric characters and dashes.", $un, $em);
        die();
    }

    if ($pw !== $pwc) {
        showRegForm("Your passwords don't match", $un, $em);
        die();
    }

    if (strlen($pw) < 8) {
        showRegForm("Your password must be at least 8 characters!", $un, $em);
    }

    $pwForDb = password_hash($pw, PASSWORD_DEFAULT);

    $ppi = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?,?,?)");
    if ($ppi->execute([$un, $pwForDb, $em])) {
        $_SESSION["username"] = $un;
        header("Location: ../index.php");
        die();
    } else {
        showRegForm("Couldn't process. Please try again.");
        die();
    }
} else {
    showRegForm();
}