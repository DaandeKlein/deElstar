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

<?php

if(isset($_POST)){
	if(isset($_POST['update'])){
	$Status = $_POST['status'];
	$id = $_POST['id'];
	
	$sql = "UPDATE `status` SET `Status` = ? WHERE `status`.`ID` = ?;";
	$pdo->prepare($sql)->execute([$Status, $id]);
	}
}
    if(isset($_GET['aktie'])){
        if($_GET['aktie'] == "verwijder"){
            $query = 'DELETE FROM `status` WHERE `StatusID` = ' .$_GET['id'];
            $pdo->query($query);
        }
    

    if($_GET['aktie'] == "wijzigen"){
        $id = $_GET['id'];
            $stmt = $pdo->prepare("select Status as status from status where StatusID = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            echo "
            <form action='status.php' method='POST' name='update'>
            <table border=1>
            <tr>
                <td>
                    Categorie
                </td>
                <td>
                    Status
                </td>
                <td>
                    Update
                </td>
            </tr>
            <tr>
                <td>Categorie</td>
                <td>
                    <input type='text' name='status' value='".$data['Status']."'>
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

        echo "<h1>Statusen</h1>";

          $tabelData = '<table border="1" width="700px"><tr>
          <td>StatusID</td>
          <td>Status</td>
          <td colspan="2">Opties</td>
      </tr>';
          $stmt = $pdo->query("SELECT * FROM status");

          foreach ($stmt as $rij){
              $tabelData .= '<tr>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['StatusID'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= $rij['Status'];
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= '<a href="status.php?aktie=wijzigen&id='.$rij['StatusID'].'">Update</a>';
                  $tabelData .= '</td>';
                  $tabelData .= '<td>';
                      $tabelData .= '<a href="status.php?aktie=verwijder&id='.$rij['StatusID'].'">Delete</a>';
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