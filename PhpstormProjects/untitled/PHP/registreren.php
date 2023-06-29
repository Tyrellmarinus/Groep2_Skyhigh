<?php
$username = filter_input(INPUT_POST, 'naam');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($username) && !empty($password) && !empty($email)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "SkyHigh";

        $conn = new mysqli($host, $dbusername, $dbpassword);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create the database if it doesn't exist
        $createDatabaseSQL = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($conn->query($createDatabaseSQL) !== TRUE) {
            echo "Error creating database: " . $conn->error;
            $conn->close();
            exit;
        }

        // Select the database
        $conn->select_db($dbname);

        // Create the table if it doesn't exist
        $tableName = "skyhigh_registreren";
        $createTableSQL = "CREATE TABLE IF NOT EXISTS $tableName (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL
        )";

        if ($conn->query($createTableSQL) === TRUE) {
            $insertSQL = "INSERT INTO $tableName (username, password, email)
                          VALUES ('$username', '$password', '$email')";

            if ($conn->query($insertSQL) === TRUE) {
                echo "New record is inserted successfully";
                // Redirect to home page or desired location
                header("Location: ../index.php");
                exit;
            } else {
                echo "ERROR: " . $insertSQL . "<br>" . $conn->error;
            }
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Fields should not be empty";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/side.css">
</head>
<body>
<div class="banner2">
    <div class="navbar">
        <img src="css/Website fotos/logo.jpg" class="logo">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Over ons</a></li>
            <li><a href="#">Boeken</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="button"></div>
    <div class="background"></div>
    <div>
        <div class="content"></div>
    </div>
    <div class="logreg-box">
        <div class="form-box registreren">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Registreer</h2>
                <div class="input-box">
                    <span class="icon"></span>
                    <input type="text" name="naam" required>
                    <label>Naam</label>
                </div>
                <div class="input-box">
                    <span class="icon"></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"></span>
                    <input type="password" name="password" required>
                    <label>Wachtwoord</label>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox" required>Gaat u akkoord met onze voorwaarden?
                    </label>
                    <a href="#">Al lid van Skyhigh, klik hier!</a>
                </div>
                <button type="submit" class="btn">Registreer</button>
                <div class="login-register">
                    <p>Al lid van Skyhigh? <a href="Inloggen.html" class="register-link">Log in</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content">
    <div class="text-sci">
        <h2>Welcome to our new Website!</h2>
    </div>
</div>
<div class="container"></div>
<script src="index.js"></script>
</body>
</html>
