<html>
    <head>
        <link rel="stylesheet" href="verhuur.css">
    </head>   
    <body>
        <p>hallo</p>
        <?php
            include("connect.php");

            if (isset($_POST["submit"]))
            {
                $naam = $_POST["naam"];
                $adres = $_POST["adres"];
                $woonplaats = $_POST["woonplaats"];
                $telefoon = $_POST["telefoon"];
                $emailadress = $_POST["emailadress"];

                $sql = "INSERT INTO klant(Naam, Adres, Woonplaats, Telefoon, Email) 
                VALUES (?, ?, ?, ?, ?);";
                $pdo->prepare($sql)->execute([$naam, $adres, $woonplaats, $telefoon, $emailadress]);                
            }


        ?>

        <div class="fietsen">
            <p>Type</p>
            <p>Merk</p>
            <p>Maat</p>
            <p>D/H fiets<p>
            <p>Prijs</p>
            <p>Status</p>
        </div>
    </body>

</html>