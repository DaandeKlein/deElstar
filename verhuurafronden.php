<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>   
    <body>

        <?php 

            include("connect.php");

            if(isset($_POST))
            {
                $ID = $_POST["fietsID"];
                echo $ID;
            }

            $query = "SELECT * FROM `klant`"; 
                        
            $query_run = mysqli_query($conn, $query);
            $check_klant = mysqli_num_rows($query_run) > 0;


                if($check_klant)
                {
                ?>
                    <form class="form-group">
                        <div>
                        <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1">
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
                    </form>
                <?php
                }
        ?>

    </body>
</html>