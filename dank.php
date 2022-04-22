<html>
    <head>
    <title> De Elstar </title>
		<meta charset=utf-8>
		<meta name=description content="beschrijving">
		<meta name=keywords content="trefword, trefword">
		<link rel="stylesheet" href="dank.css">
    </head>
    <body>

<?php
            include("connect.php");

            if (isset($_POST["submit"]))
            {
                $naam = $_POST["Naam"];
                $adres = $_POST["Adres"];
                $woonplaats = $_POST["Woonplaats"];
                $telefoon = $_POST["Telefoon"];
                $emailadress = $_POST["Emailadress"];

                $sql = "INSERT INTO klant(Naam, Adres, Woonplaats, Telefoon, Email) 
                VALUES (?, ?, ?, ?, ?);";
                $pdo->prepare($sql)->execute([$naam, $adres, $woonplaats, $telefoon, $emailadress]);
            }

            unset($_POST["submit"]);

        ?>

<div class ="text"> 
            <p>Bedankt voor het registreren bij fietsverhuur de Elstar.</p>
          </div>
              <a href="index.php" class="link_button">Home</a>
      



    </body>









</html>