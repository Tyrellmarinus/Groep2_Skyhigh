<?php
session_start();

if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
    unset($_SESSION['login_success']);
    $successMessage = "Login successful!";
} else {
    $successMessage = "";
}

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$errorMessage = ""; // Variable to store error message

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($username) && !empty($password)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "SkyHigh";

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create the table if it doesn't exist
        $loginTable = "skyhigh_inloggen";
        $createLoginTableSQL = "CREATE TABLE IF NOT EXISTS $loginTable (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        if ($conn->query($createLoginTableSQL) === TRUE) {
            // Check if the entered username and password exist in the "skyhigh_registreren" table
            $registerTable = "skyhigh_registreren";
            $checkLoginSQL = "SELECT * FROM $registerTable WHERE username = ?";
            $stmt = $conn->prepare($checkLoginSQL);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();


            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($password === $row['password']) {
                    // Store login activity in the "skyhigh_inloggen" table
                    $insertLoginSQL = "INSERT INTO $loginTable (username) VALUES (?)";
                    $stmt = $conn->prepare($insertLoginSQL);
                    $stmt->bind_param("s", $username);
                    $stmt->execute();

                    // Set session variable to indicate successful login
                    $_SESSION['login_success'] = true;

                    // Redirect to home page or desired location
                    header("Location: ../index.php");
                    exit;
                } else {
                    $errorMessage = "Invalid password";
                }
            } else {
                $errorMessage = "Invalid username";
            }
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
    } else {
        $errorMessage = "Please fill in both username and password";
    }
}
?>

<!DOCTYPE html>
<html lang="en"  xmlns="http://www.w3.org/1999/html">>
<header>
    <meta charset="UTF-8">
    <title>Sky High - Inloggen</title>
    <link rel="stylesheet"  type="text/css" href="../css/side.css">
</header>

<body>
<div class="banner1">
    <div class="header-bar">
        <img src="css/Website fotos/logo.jpg" class="logo">

        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="overonss.html">Over ons</a></li>
            <li><a href="3">Boeken</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
    <div class="button">
    </div>

    <div class="background"></div>
    <div>
        <div class="content"></div>
    </div>

    <div class="logreg-box container">
        <div class="form-box login">
            <form action="#">

    <main>
        <div class="banner">
        </div>

        <div class="logreg-box">
            <h1>Inloggen</h1>
            <?php if ($errorMessage !== ""): ?>
                <p class="error-message"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            <?php if ($successMessage !== ""): ?>
                <p class="success-message"><?php echo $successMessage; ?></p>
            <?php endif; ?>
            <form action="inloggen.php" method="POST">
                <div class="input-box"><label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" required>
                <br></div>

                <div class="input-box">
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" required>
                <br></div>

                <input type="submit" value="Inloggen">
                <div class="remember-forgot">

                    <label><input type="checkbox">Onthoud mij
                    </label>
                    <a href="#"> Wachtwoord vergeten?</a>

                    <div class="login-register">
                        <p>Nog geen skyhigh Lid? <a href="registreren.html"
                                                    class="register-link">Regristreer Hier</a> </p>
            </form>
        </div>
    </main>


</div>
        <div class="container"></div>
        <div class="content" </div>

</body>
</html>

<a href="inloggen.php" class="small-link active">Inloggen</a>
<a href="registreren.php" class="small-link">Registreren</a>