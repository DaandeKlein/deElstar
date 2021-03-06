<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="verhuurafronden.css">
    </head>   
    <body>

        <?php 
            session_start();

            include("connect.php");

            if(isset($_POST))
            {
                $_SESSION["ID"] = $_POST["fietsID"];   
            }

            $query = "SELECT * FROM `klant`"; 
                        
            $query_run = mysqli_query($conn, $query);
            $check_klant = mysqli_num_rows($query_run) > 0;


                if($check_klant)
                {
                ?>
                    <div class="container">   
                        <form id="form" action="verhuur.php" method="POST">                            
                            <div>
                            <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="Email" required>
                                <option value="">Selecteer een Email</option>
                                    
                                    <?php 
                                        while($row = mysqli_fetch_array($query_run))
                                        {
                                            ?>
                                                    <option>
                                                        <?php echo $row['Email']?>
                                                    </option>
                                            <?php
                                        }
                                    ?>

                                </select>
                            </div>
                        
                        <br>

                            <div class="form-group">
                                <label for="DatumVan">Datum van</label>
                                <input class="form-control" id="DatumVan" aria-describedby="DatumVan" placeholder="Datum Van" name="DatumVan">
                                <small id="DatumVanHelp">Gebruik AUB: dag-maand-jaar "( 00-00-0000 )"</small>
                            </div>
                        
                        <br>
                        
                            <div class="form-group">
                                <label for="DatumTot">Datum tot</label>
                                <input class="form-control" id="DatumTot" aria-describedby="DatumTot" placeholder="Datum Tot" name="DatumTot">
                                <small id="DatumTotHelp">Gebruik AUB: dag-maand-jaar "( 00-00-0000 )"</small>
                            </div>
                        
                        <br>
                            <button class="btn btn-primary" name="verhuur" value="verhuur" type="submit">Verhuur Afronden</button>
                        </form>
                    </div>
                <?php
                }
        ?>

    </body>
</html>