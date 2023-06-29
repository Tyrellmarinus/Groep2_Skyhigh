<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (!empty($username) && !empty($password) && !empty($email) && $email !== false) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "Skyhigh_registreren";

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $tableName = "SkyHighRegistreren";
        $createTableSQL = "CREATE TABLE IF NOT EXISTS $tableName (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL
        )";

        if ($conn->query($createTableSQL) === TRUE) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

            $insertSQL = "INSERT INTO $tableName (username, password, email)
                          VALUES (?, ?, ?)";

            $stmt = $conn->prepare($insertSQL);
            $stmt->bind_param("sss", $username, $hashedPassword, $email);

            if ($stmt->execute()) {
                echo "New record inserted successfully";
            } else {
                echo "Error inserting record: " . $stmt->error;
            }
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Please fill in all the fields correctly";
    }
}
?>
