<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<header>
    <meta charset="UTF-8">
    <title>Inloggen</title>
    <link rel="stylesheet" type="text/css" href="css/boek.css">

</header>


<body class="mainbg">

<div class="navbar">
    <img src="css/Website fotos/logo.jpg" class="logo">

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="overonss.php">Over ons</a></li>
        <li><a href="vliegtuig.php">Boeken</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</div>


<div class="form">
    <div class="form-text">
        <h1><span><img src="" alt=""></span>BOEK NU</h1><span><img src="" alt=""></span></h1>
        <p>Boek hier uw gekozen zweef vliegtuig</p>
    </div>
    <div class="main-form">
        <form action="index.php" method="get">
            <div>
                <span>Wat is uw naam?</span>
                <input type="text" name="Naam" id="name" placeholder=" Typ uw naam in..." required>
            </div>
            <div>
            <span>Wat is uw Email adress?</span>
            <input type="email" name="Naam" id="email" placeholder="Typ uw email adress hier..."
            required>
        </div>
            <div>


            <span>Hoeveel personen?</span>
             <select name="personen" id="people" required>
                 <option value=""> Personen</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
             </select>


        </div>
            <div>
            <span>Welke tijd?</span>
            <input type="text" name="tijd" id="tijd" required>
        </div>
            <div>
            <span>Voor Welke datum?</span>
            <input type="datum" name="datum" id="datum" placeholder="date" required>
        </div>
            <div>
                <span>Wat is uw telefoonnummer?</span>
                <input type="nummer" name="nummer" id="nummer" placeholder="Typ uw nummer hier. . . " required>
            </div>
            <div id="submit">

            </div>
                <span></span>
                <input type="submit" value="verzenden" name="verzenden" id="verzenden">

        </form>
    </div>
</div>
</body>