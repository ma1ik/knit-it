<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/stylesheet.css">
    <script src="https://kit.fontawesome.com/e84fe85387.js" crossorigin="anonymous"></script>
	<title>Welcome | Knit It</title>
</head>

<body>

<?php require "php_scripts/navbar.php" ?>

<?php
function showItems() {
    $count = 15;

    $arr = [];
    for ($i = 0; $i < $count; $i++) {
        $bar = 'url("https://previews.123rf.com/images/norgal/norgal1706/norgal170600133/80188340-knitting-wool-and-knitting-needles-knitting-equipment.jpg")';
        $arr[] = "<div class='pattern'><div class='pattern-icon' style='background-image: $bar;'></div><div class='pattern-description'><h3>Pattern Title</h3><div><div class='pattern-difficulty'>"
                 . "<i class='fas fa-rectangle-wide icon-highlighted'></i>"
                 . "<i class='fas fa-rectangle-wide icon-highlighted'></i>"
                 . "<i class='fas fa-rectangle-wide icon-highlighted'></i>"
                 . "<i class='fas fa-rectangle-wide'></i>"
                 . "<i class='fas fa-rectangle-wide'></i>"
                 .  "</div><div class='pattern-stars'>"
                 . "<i class='fas fa-star icon-highlighted'></i>"
                 . "<i class='fas fa-star icon-highlighted'></i>"
                 . "<i class='fas fa-star icon-highlighted'></i>"
                 . "<i class='fas fa-star'></i>"
                 . "<i class='fas fa-star'></i>"
                 . "</div></div></div></div>";
    }

    return join("", $arr);
}
?>

<section class="store-flex">
    <div class="sort-panel">
        <div class="sort-panel-inner">
            <div class="category">
                <div class="category-header">Sort</div>
                <div class="category-body">Rating
                    <span class="filters pad">
                        <i class="fas fa-caret-square-up small"></i><i class="fas fa-caret-square-down small"></i><i class="fas fa-rectangle-wide icon-highlighted"></i>
                    </span>
                </div>
            </div>
            <div class="category">
                <div class="category-header">
                    Filters
                </div>
                <div class="category-body">Difficulty</div>
                <div class="category-body-sub">Minimum
                    <span class="filters">
                        <i class='fas fa-star icon-highlighted'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </span>
                </div>
                <div class="category-body-sub">Maximum
                    <span class="filters">
                        <i class='fas fa-star icon-highlighted'></i>
                        <i class='fas fa-star icon-highlighted'></i>
                        <i class='fas fa-star icon-highlighted'></i>
                        <i class='fas fa-star icon-highlighted'></i>
                        <i class='fas fa-star icon-highlighted'></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="patterns-panel">
        <?php echo showItems(); ?>
    </div>
</section>

<footer>
	<p class="a">Knit it || RGU Guardians</p>
</footer>
</body>
</html>