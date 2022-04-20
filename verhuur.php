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

            unset($_POST["submit"]);

        ?>

        <?php 
        
            $query = "SELECT * FROM fiets";
            $query_run = mysqli_query($conn, $query);
            $check_fiets = mysqli_num_rows($query_run) > 0;

            if($check_fiets)
            {
                while($row = mysqli_fetch_array($query_run))
                {
                   echo $row['Type'];
                }
            }
            else
            {
                echo "No elstar items found";
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