<html>
    <head>
        <link rel="stylesheet" href="verhuur.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

        <?php 
        
            $query = "SELECT * FROM fiets";
            $query_run = mysqli_query($conn, $query);
            $check_fiets = mysqli_num_rows($query_run) > 0;

            if($check_fiets)
            {  
                ?>
                    <div class="container ml-4">
                        <div class="row mt-4">
                <?php
                while($row = mysqli_fetch_array($query_run))
                {
                   ?>

                    
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="" class="card-img-top" alt="">
                                        <h2 class="card-title"> <?php echo $row['Type']; ?> </h2>
                                        <p class="card-text"> <?php echo $row['MerkID']; ?></p>
                                        <p class="card-text"> <?php echo $row['Maat']; ?></p>
                                        <p class="card-text"> <?php echo $row['DamensHeren']; ?></p>
                                        <p class="card-text"> <?php echo $row['Prijs']; ?></p>
                                        <p class="card-text"> <?php echo $row['StatusID']; ?></p>
                                    </div>
                                </div>
                            </div>
                   <?php                                       
                }
                ?>
                        </div>
                    </div>
                <?php
            }
            else
            {                
                echo "No elstar items found";
            }
        ?>
        
    </body>

</html>