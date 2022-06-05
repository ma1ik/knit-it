<?php
session_start();

require "../auth/db.php";
global $pdo;

function getURL() {
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
// Append the host(domain name, ip) to the URL.
    $url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
    $url .= $_SERVER['REQUEST_URI'];

    return $url;
}

function getProfileName() {
    global $pdo;
    $url = getURL();

    $arr = explode("/", $url);
    $arr = array_reverse($arr);
    $up = false;
    foreach ($arr as $elem) {
        if (strlen($elem) > 0) {
            $up = $elem;
            break;
        }
    }

    if ($up !== false) {
        $qr = $pdo->prepare("SELECT * FROM users WHERE username=?");
        $qr->execute([$up]);

        if ($qr->rowCount() > 0) {
            return htmlspecialchars($up, ENT_QUOTES + ENT_HTML5);
        } else {
            return false;
        }
    }
    return false;
}

$uname = getProfileName();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>User <?php echo $uname ? $uname : "Not Found" ?> | Knit It</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="user.css">
    <script src="https://kit.fontawesome.com/e84fe85387.js" crossorigin="anonymous"></script>
</head>

<body>
<?php
require "../php_scripts/navbar_in_directory.php";
if ($uname === false) {
    ?>
    <div class="notfound">
        <h1>User not found</h1>
        <p>We tried our hardest... but we couldn't find them. Perhaps they're really good at hide and seek?</p>
    </div>
<?php
} else {
?>
    <div class="user-header">
        <img src="https://robohash.org/<?php echo $uname; ?>.png" alt="<?php echo $uname; ?>"><!--
        --><h1><?php echo $uname; ?></h1>
    </div>

    <div class="social">

        <ol class="olSoc center">

            <div class="olSocCenter">
                <li class="olSocTop">
                    <img src="https://robohash.org/<?php echo $uname; ?>.png" alt="equipment" class="socProfileImage socProfileImagePost">
                    <img src="https://previews.123rf.com/images/norgal/norgal1706/norgal170600133/80188340-knitting-wool-and-knitting-needles-knitting-equipment.jpg" alt="equipment" class="socPatternsImage">
                </li>
                <li class="olSocBottom">
                    <p><?php echo $uname; ?></p>
                    <p>Just finished my first set of teddy bears. I hope the kids like them :)</p>
                </li>
            </div>
            <br>

            <div class="olSocCenter">
                <li class="olSocTop">
                    <img src="https://robohash.org/<?php echo $uname; ?>.png" alt="equipment" class="socProfileImage socProfileImagePost">
                    <img src="https://cdn.apartmenttherapy.info/image/upload/f_auto,q_auto:eco/k%2FPhoto%2FLifestyle%2F2020-04-How-to-Maintain-a-Wooden-Dining-Table%2FHow-to-Maintain-a-Wooden-Dining-Table722" alt="equipment" class="socPatternsImage">
                </li>
                <li class="olSocBottom">
                    <p><?php echo $uname; ?></p>
                    <p>Just finished my first set of teddy bears. I hope the kids like them :)</p>
                </li>
            </div>
            <br>

            <div class="olSocCenter">
                <li class="olSocTop">
                    <img src="https://robohash.org/<?php echo $uname; ?>.png" alt="equipment" class="socProfileImage socProfileImagePost">
                    <img src="https://static.onecms.io/wp-content/uploads/sites/34/2018/02/12171216/woman-knitting-getty-763267111.jpg" alt="equipment" class="socPatternsImage">
                </li>
                <li class="olSocBottom">
                    <p><?php echo $uname; ?></p>
                    <p>Just finished my first set of teddy bears. I hope the kids like them :)</p>
                </li>
            </div>
            <br>

        </ol>



    </div>
<?php
}
?>
</body>
</html>
