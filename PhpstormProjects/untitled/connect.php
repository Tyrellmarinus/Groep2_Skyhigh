<?php

//Database Connection
$host = "localhost";
$dbname = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($host, $username, $password, $dbname);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$insert_sql = "INSERT INTO users (user_name, email, PASSWORD) VALUES ('$name', '$email', '$password')";

if (mysqli_query($con, $insert_sql)) {
    echo "new registration";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);

header('location: inloggen.php')
?>

