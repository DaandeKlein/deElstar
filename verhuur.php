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
        
            $query = "SELECT 
                fiets.Type, fiets.Maat, fiets.DamensHeren, fiets.Prijs, merk.Naam, status.Status 
                FROM 
                    fiets
                LEFT JOIN 
                    merk 
                on 
                    merk.MerkID = fiets.MerkID 
                LEFT JOIN   
                    status 
                on 
                    status.StatusID = fiets.StatusID
                Order By
                    merk.Naam asc";
            $query_run = mysqli_query($conn, $query);
            $check_fiets = mysqli_num_rows($query_run) > 0;

            if($check_fiets)
            {
                while($row = mysqli_fetch_array($query_run))
                {

=======
                   ?>
                    
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="" class="card-img-top" alt="">
                                        <h2 class="card-title"> <?php echo $row['Type']; ?> </h2>
                                        <p class="card-text"> Merk: <?php echo $row['Naam']; ?></p>
                                        <p class="card-text"> Maat: <?php echo $row['Maat']; ?></p>
                                        <p class="card-text"> <?php echo $row['DamensHeren']; ?>: fiets</p>
                                        <p class="card-text"> Status: <?php echo $row['Status']; ?></p>
                                        <p class="card-text"> Prijs: €<?php echo $row['Prijs']; ?></p>
                                    </div>
                                </div>
                            </div>

                   <?php                                       
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