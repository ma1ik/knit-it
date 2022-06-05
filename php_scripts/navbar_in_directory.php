<header>
    <div class="navbar">

        <img src="../assets/LogoTransWhite.png" alt="logo" width="128px" height="auto" class="logo">


        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href='../tutorial.php'>Tutorial</a></li>
                <li><a href="../social.php">Social</a></li>
                <li><a href="../contact.php">Contact Us</a></li>
                <?php
                if (isset($_SESSION["username"])) {
                    ?><li><a href="javascript:void(0)">Hi, @<?php echo $_SESSION["username"]; ?></a></li><li><a href="../auth/logout.php">Logout</a></li><?php
                } else {
                    ?>
                    <li><a href="../auth/login.php">Login</a></li>
                    <li><a href="../auth/register.php">Register</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>

    </div>
</header>