<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<header>
    <meta charset="UTF-8">
    <title>Inloggen</title>
    <link rel="stylesheet" type="text/css" href="css/contac.css">

</header>


<body>
<div class="container">
    <div class="navbar">
        <img src="css/Website fotos/logo.jpg" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="overonss.php">Over ons</a></li>
                <li><a href="vliegtuig.php">Boeken</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </div>
    <form onsubmit="sendEmail(); reset(); return false;">
        <h3>NEEM CONTACT OP</h3>
        <input type="text" id="name" placeholder="Uw Naam" required>
        <input type="email" id="email" placeholder="Email Id" required>
        <input type="text" id="phone" placeholder="Telefoonnummer" required>
<textarea id="message" rows="4" placeholder="Hoe kunnen we u assisteren?"></textarea>
        <button type="submit">Vertsuur</button>
    </form>
</div>
<script src=" https://smtpjs.com/v3/smtp.js"></script>
<script>
    function sendEmail(){
        Email.send({
            Host : "smtp.gmail.com",
            Username : "mert190905@gmail.com",
            Password : "mertficano",
            To : 'mertficano@gmail.com',
            From : document.getElementById("email").value,
            Subject : "New contact form enquiry",
            Body : "And this is the body"
        }).then(
            message => alert(message)
        );
    }
</script>
</body>
</html>
