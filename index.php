<html>
    <head>

    </head>
    <body>
	<legend>Registratie</legend>
    <form action="verhuur.php" method="$_POST">
        Naam: <input name="naam" type="tekst"><br>
        Adres: <input name="adres" type="tekst"><br>
        Postcode:<input name="postcode" type="tekst"><br>
        Woonplaats: <input name="woonplaats" type="tekst"><br>
        Emailadress:<input name="emailadress" type="tekst"><br>
        <input type="submit" value="submit" name="submit">
    </form>
        <?php
            include("connect.php");
             
            if (isset($_POST["submit"]))
            {
                $naam = $_POST["naam"];
                $adres = $_POST["adres"];
                $postcode = $_POST["postcode"];
                $woonplaats = $_POST["woonplaats"];
                $emailadress = $_POST["emailadress"];
            }
        ?>
    </body>
</html>