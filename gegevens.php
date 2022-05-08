<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="gegevens.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>   
    <body>
        
        <?php 
            require_once 'commands.php';
        ?>

            <div class="row justify-content-center">
            <form action="" type="POST">
                <div class="form-group">
                    <label>MerkID</label>
                    <input type="text" name="MerkID" class="form-control" value="Vul merkID in">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="Type" class="form-control" value="Vul Type fiets in">
                </div>
                <div class="form-group">
                    <label>Maat</label>
                    <input type="text" name="Maat" class="form-control" value="Vul de maat in">
                </div>
                <div class="form-group">
                    <label>Damens of Heren</label>
                    <input type="text" name="DH" class="form-control" value="Vul Damens of Heren in">
                </div>
                <div class="form-group">
                    <label>Prijs</label>
                    <input type="text" name="Prijs" class="form-control" value="Vul de Prijs in">
                </div>
                <div class="form-group">
                    <label>StatusID</label>
                    <input type="text" name="StatusID" class="form-control" value="Vul de StatusID in">
                </div>
                <div class="form-group">
                    <button type="submit" name="save" class="btn btn-primary">save</button>
                </div>
            </form>
            </div>

    </body>
</html>