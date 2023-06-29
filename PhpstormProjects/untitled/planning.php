<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="UTF-8">
  <title>Overons</title>
  <link rel="stylesheet" type="text/css" href="css/plan.css">
</head>
<body>
<div class="banner">
  <div class="navbar">
    <img src="css/Website fotos/logo.jpg" class="logo">
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="overonss.php">Over ons</a></li>
        <li><a href="3">Boeken</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </div>

  <form>
  <label for="naam">Naam:</label>
  <input type="text" id="naam" name="naam" required><br><br>

  <label for="datum">Datum:</label>
  <input type="date" id="datum" name="datum" required><br><br>

  <label for="tijd">Tijd:</label>
  <input type="time" id="tijd" name="tijd" required><br><br>

  <input type="submit" value="Reserveren">
</form>