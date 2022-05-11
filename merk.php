<html>
    <head>
        <link rel="stylesheet" href="index.css">
        <title>fietsverhuur de elstar</title>
    </head>
    <body>
    <div class="Container"> 
    <div class="table_div">
<?php
include("navbar.php");
include("connect.php");

$stmt = $pdo->query("SELECT * FROM merk");

if(isset($_POST['toevoegen'])){
    $MerkNaam = $_POST['merknaam'];

    $sql = "INSERT INTO merk (MerkNaam)
    VALUES (?);";
    $pdo->prepare($sql)->execute([$MerkNaam]);
}
?>

<div class="Container">
<h1>Merken toevoegen</h1>
<div class="table_div"> 
<form action="merk.php" method="post">
  <table border="1" width="500px">
      <tr>
          <td>MerkNaam:</td>
          <td><input type="text" placeholder="merknaam" name="merknaam"></td>
      </tr>
      <tr>
          <td colspan="2" align="right"><input type="submit" value="toevoegen" name="toevoegen"></td>
      </tr>
  </table>
</form>
<?php

if(isset($_POST)){
	if(isset($_POST['update'])){
	$naam = $_POST['naam'];
	$adres = $_POST['adres'];
    $woonplaats = $_POST['woonplaats'];
    $telefoon = $_POST['telefoon'];
    $email = $_POST['email'];
	$id = $_POST['id'];
	
	$sql = "UPDATE `merk` SET `Naam` = ?, `Adres` = ?, `Woonplaats` = ?, `Telefoon` = ?, `Email` = ? WHERE `klant`.`ID` = ?;";
	$pdo->prepare($sql)->execute([$naam, $adres, $woonplaats, $telefoon, $email, $id]);
	}
}
    if(isset($_GET['aktie'])){
        if($_GET['aktie'] == "verwijder"){
            $query = 'DELETE FROM `merk` WHERE `MerkID` = ' .$_GET['id'];
            $pdo->query($query);
        }
    

    if($_GET['aktie'] == "wijzigen"){
        $id = $_GET['id'];
            $stmt = $pdo->prepare("select MerkNaam as merknaam from klant where MerkID = ?");
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
                    MerkNaam
                </td>
                <td>
                    Update
                </td>
            </tr>
            <tr>
                <td>Categorie</td>
                <td>
                    <input type='text' name='merknaam' value='".$data['MerkNaam']."'>
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
          <td>MerkID</td>
          <td>MerkNaam</td>
          <td colspan="2">Opties</td>
      </tr>';
          $stmt = $pdo->query("SELECT * FROM merk");

          foreach ($stmt as $rij){
              $tabelData .= '<tr>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['MerkID'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['MerkNaam'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= '<a href="merk.php?aktie=wijzigen&id='.$rij['MerkID'].'">Update</a>';
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= '<a href="merk.php?aktie=verwijder&id='.$rij['MerkID'].'">Delete</a>';
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