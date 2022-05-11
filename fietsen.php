<html>
    <head>
        <title>fietsverhuur de elstar</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
    <div class="table_div">
          <?php

          include("navbar.php");
          include("connect.php");

          $stmt = $pdo->query("SELECT * FROM merk");

          if(isset($_POST['toevoegen'])){
              $MerkID = $_POST['merk'];
              $Type = $_POST['type'];
              $Maat = $_POST['maat'];
              $DH = $_POST['heren_dames_uni'];
              $Prijs = $_POST['prijs'];
              $StatusID = $_POST['StatusID']; 
              $sql = "INSERT INTO fiets (MerkID, Type, Maat, DamensHeren, Prijs, StatusID)
              VALUES (?, ?, ?, ?, ?, ?);";
              $pdo->prepare($sql)->execute([$MerkID, $Type, $Maat, $DH, $Prijs, $StatusID]);
          }
          ?>

          <div class="Container">
        <h1>fietsen toevoegen</h1>
        <div class="table_div"> 
        <form action="fietsen.php" method="post">
            <table  width="500px">
                <tr>
                <td><label>MerkID:</label></td>
                    <td><select name="merk" id="merk">
                        <?php
                            foreach ($stmt as $rij){
                                echo "<option value=";
                                echo $rij['MerkID'];
                                echo ">";
                                echo $rij['MerkNaam'];
                                echo "</option>";
                            }
                        ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><input type="text" placeholder="type" name="type"></td>
                </tr>
                <tr>
                    <td>Maat:</td>
                    <td><input type="text" placeholder="maat" name="maat"></td>
                </tr>
                <tr>
                    <td><label>Damens of Heren:</label></td>
                        <td><select name="heren_dames_uni" id="heren_dames_uni">
                            <option value="Heren">heren</option>
                            <option value="Damens">dames</option>
                            <option value="Uni">uni</option>
                        </select>
                    </td>
		        </tr>
                <tr>
                    <td>Prijs:</td>
                    <td><input type="text" placeholder="prijs" name="prijs"></td>
                </tr>
                <tr>
                    <td>StatusID:</td>
                    <td><select name="StatusID" id="statusid">
                            <option value="1">Aanwezig</option>
                            <option value="2">Verhuurd</option>
                            <option value="3">Niet Aanwezig</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit" value="toevoegen" name="toevoegen"></td>
                </tr>
            </table>
        </form>
        <?php

if(isset($_POST)){
	if(isset($_POST['update'])){
    $Maat = $_POST['maat'];
    $Prijs = $_POST['prijs'];
    $StatusID = $_POST['statusID'];
    $id = $_POST['id'];

	$sql = "UPDATE `fiets` SET `Maat` = ? , 'Prijs' = ?, 'StatusID' = ?  WHERE `fiets`.`ID` = ?;";
	$pdo->prepare($sql)->execute([$Maat, $Prijs, $StatusID, $id]);
	}
}


if(isset($_GET['aktie'])){
        if($_GET['aktie'] == "verwijder"){
            $query = 'DELETE FROM `fiets` WHERE `ID` = ' .$_GET['id'];
            $pdo->query($query);        
        }


    if($_GET['aktie'] == "wijzigen"){
        $id = $_GET['id'];
            $stmt = $pdo->prepare("SELECT maat as maat, prijs as prijs, StatusID as statusID from fiets where ID = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            echo "
            <form action='fietsen.php' method='POST' name='update'>
            <table border=1>
            <tr>
                <td>
                    Maat
                </td>
                <td>
                    Prijs
                </td>
                <td>
                    Status
                </td>
                <td>
                    Update
                </td>
            </tr>
            <tr>
                <td>
                    <input type='text' name='maat' value='".$data['maat']."'>
                </td>
                <td>
                    <input type='text' name='prijs' value='".$data['prijs']."'>
                </td>
                <td>
                    <select name='statusID' value='".$data['statusID']."'>
                        <option value='0'>berschikbaar</option>
                        <option value='1'>uitgeleend</option>
                        <option value='2'>in onderhoud</option>
                </select></td><td>
                    <input type='hidden' name='id' value='".$id."'>
                    <input type='submit' name='update' value='Wijzig product'>
                </td>
            </tr>
            </form>
            
            ";
            exit;
        }
    }

        $tabelData = '<table border="1" width="700px"><tr>
            <td>ID</td>
            <td>MerkID</td>
            <td>Type</td>
            <td>maat</td>
            <td>DamensHeren</td>
            <td>Prijs</td>
            <td>StatusID</td>
            <td colspan="2">Opties</td>
        </tr>';
            $stmt = $pdo->query("SELECT * FROM fiets");

            foreach ($stmt as $rij){
                $tabelData .= '<tr>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['ID'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['MerkID'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['Type'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['Maat'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['DamensHeren'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['Prijs'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['StatusID'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= '<a href="fietsen.php?aktie=wijzigen&id='.$rij['ID'].'">Update</a>';
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= '<a href="fietsen.php?aktie=verwijder&id='.$rij['ID'].'">Delete</a>';
                    $tabelData .= '</td>';
                    $tabelData .= '</tr>';
            }
            $tabelData .= '</table>';
            echo $tabelData;
        ?>
</div>
</div>
</div>
</body>
</html>