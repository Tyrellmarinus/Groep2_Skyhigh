<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sky High - Reserveren</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <header class="header-bar">
        <div class="top-right">
            <a href="inloggen.php" class="small-link">Inloggen</a>
            <a href="registreren.php" class="small-link">Registreren</a>
        </div>
        <div class="header-right">
            <nav>
                <a href="../index.php" class="nav-link active">Home</a>
                <a href="fotos.php" class="nav-link">Fotos</a>
                <a href="community.php" class="nav-link">Community</a>
                <a href="reserveren.php" class="nav-link">Reserveren</a>
                <a href="contact.php" class="nav-link">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="banner">
            <a href="../index.php" class="logo-link">
                <img src="../img/Logo.jpg.png" alt="SkyHighLogo" class="logo-image">
            </a>
        </div>

        <div class="island">
            <?php
            // Place your PHP code here
            echo "<h1>Reserveren</h1>";
            echo "<p>Welcome to the reservation page.</p>";
            ?>
        </div>
    </main>

    <footer class="footer-bar">
        <p class="footer-text">Skyhigh, &copy; 2023</p>
    </footer>
</div>
</body>
</html>
