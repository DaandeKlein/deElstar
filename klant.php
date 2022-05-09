<html>
    <head>
        <link rel="stylesheet" href="index.css">
        <title>fietsverhuur de elstar</title>
    </head>
    <body>
    <div class="Container"> 
    <div class="table_div">
<?php
include("connect.php");
if(isset($_POST)){
	if(isset($_POST['update'])){
	$naam = $_POST['naam'];
	$adres = $_POST['adres'];
    $woonplaats = $_POST['woonplaats'];
    $telefoon = $_POST['telefoon'];
    $email = $_POST['email'];
	$id = $_POST['id'];
	
	$sql = "UPDATE `klant` SET `Naam` = ?, `Adres` = ?, `Woonplaats` = ?, `Telefoon` = ?, `Email` = ? WHERE `klant`.`ID` = ?;";
	$pdo->prepare($sql)->execute([$naam, $adres, $woonplaats, $telefoon, $email, $id]);
	}
}
    if(isset($_GET['aktie'])){
        if($_GET['aktie'] == "verwijder"){
            $query = 'DELETE FROM `klant` WHERE `ID` = ' .$_GET['id'];
            $pdo->query($query);
        }
    

    if($_GET['aktie'] == "wijzigen"){
        $id = $_GET['id'];
            $stmt = $pdo->prepare("select Naam as naam, Adres as adres, Woonplaats as woonplaats, Telefoon as telefoon, Email as Email from klant where ID = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            echo "
            <form action='klant.php' method='POST' name='update'>
            <table border=1>
            <tr>
                <td>
                    Categorie
                </td>
                <td>
                    Naam
                </td>
                <td>
                    Adres
                </td>
                <td>
                    Woonplaats
                </td>
                <td>
                    Postcode
                </td>
                <td>
                    E-Mail
                </td>
                <td>
                    Update
                </td>
            </tr>
            <tr>
                <td>Categorie</td>
                <td>
                    <input type='text' name='naam' value='".$data['Naam']."'>
                </td>
                <td>
                    <input type='text' name='adres' value='".$data['Adres']."'>
                </td>
                <td>
                    <input type='text' name='woonplaats' value='".$data['Woonplaats']."'>
                </td>
                <td>
                    <input type='text' name='telefoon' value='".$data['Telefoon']."'>
                </td>
                <td>
                    <input type='text' name='email' value='".$data['Email']."'>
                </td>
                <td>
                    <input type='hidden' name='id' value='".$id."'>
                    <input type='submit' name='update' value='Wijzig product'>
                </td>
            </tr>
            </form>
            
            ";
            exit;
        }
    }

        echo "<h1>Klanten Informatie</h1>";

          $tabelData = '<table border="1" width="700px"><tr>
          <td>ID</td>
          <td>Naam</td>
          <td>Adres</td>
          <td>Woonplaats</td>
          <td>Telefoon nummer</td>
          <td>E_mail</td>
          <td colspan="2">Opties</td>
      </tr>';
          $stmt = $pdo->query("SELECT * FROM klant");

          foreach ($stmt as $rij){
              $tabelData .= '<tr>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['ID'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['Naam'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['Adres'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['Woonplaats'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['Telefoon'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['Email'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= '<a href="klant.php?aktie=wijzigen&id='.$rij['ID'].'">Update</a>';
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= '<a href="klant.php?aktie=verwijder&id='.$rij['ID'].'">Delete</a>';
                  $tabelData .= '</td>';
                  $tabelData .= '</tr>';
          }
          $tabelData .= '</table>';
          echo $tabelData;
          ?>
</div>
        </div>
    </body>
</html>