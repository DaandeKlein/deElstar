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

          $stmt = $pdo->query("SELECT * FROM verhuur");

          if(isset($_POST['toevoegen'])){
              $KlantID = $_POST['klantID'];
              $FietsID = $_POST['fietsID'];
              $DatumVerhuur = $_POST['datumverhuur'];
              $DatumTot = $_POST['datumtot'];
              $sql = "INSERT INTO verhuur (KlantID, FietsID, DatumVerhuur, DatumTot)
              VALUES (?, ?, ?, ?);";
              $pdo->prepare($sql)->execute([$KlantID, $FietsID, $DatumVerhuur, $DatumTot]);
          }
          ?>

          <div class="Container">
        <h1>Verhuringen toevoegen</h1>
        <div class="table_div"> 
        <form action="verhuringen.php" method="post">
            <table border="1" width="500px">
                <tr>
                    <td>KlantID:</td>
                    <td><input type="text" placeholder="klantID" name="klantID"></td>
                </tr>
                <tr>
                    <td>FietsID:</td>
                    <td><input type="text" placeholder="fietsID" name="fietsID"></td>
                </tr>
                <tr>
                    <td>DatumVerhuur:</td>
                    <td><input type="text" placeholder="datumverhuur" name="datumverhuur"></td>
                </tr>
                <tr>
                    <td>DatumTot:</td>
                    <td><input type="text" placeholder="datumtot" name="datumtot"></td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit" value="toevoegen" name="toevoegen"></td>
                </tr>
            </table>
        </form>
        <?php

if(isset($_POST)){
	if(isset($_POST['update'])){
    $KlantID = $_POST['klantID'];
    $FietsID = $_POST['fietsID'];
    $DatumVerhuur = $_POST['datumverhuur'];
    $DatumTot = $_POST['datumtot'];
    $id = $_POST['id'];

	$sql = "UPDATE `verhuur` SET `KlantID` = ? , 'FietsID' = ?, 'DatumVerhuur' = ?, 'DatumTot' = ?  WHERE `verhuur`.`ID` = ?;";
	$pdo->prepare($sql)->execute([$Maat, $Prijs, $StatusID, $id]);
	}
}


if(isset($_GET['aktie'])){
        if($_GET['aktie'] == "verwijder"){
            $query = 'DELETE FROM `verhuur` WHERE `ID` = ' .$_GET['id'];
            $pdo->query($query);        
        }


    if($_GET['aktie'] == "wijzigen"){
        $id = $_GET['id'];
            $stmt = $pdo->prepare("SELECT KlantID as KlantID, FietsID as FietsID, DatumVerhuur as DatumVerhuur, DatumTot as DatumTot from verhuur where ID = ?");
            $stmt->execute([$id]);
            $data = $stmt->fetch();

            echo "
            <form action='verhuringen.php' method='POST' name='update'>
            <table border=1>
            <tr>
                <td>
                    KlantID
                </td>
                <td>
                    FietsID
                </td>
                <td>
                    DatumVerhuur
                </td>
                <td>
                    DatumTot
                </td>
                <td>
                    Update
                </td>
            </tr>
            <tr>
                <td>
                    <input type='text' name='klantID' value='".$data['klantID']."'>
                </td>
                <td>
                    <input type='text' name='fietsID' value='".$data['fietsID']."'>
                </td>
                <td>
                    <input type='text' name='datumverhuur' value='".$data['datumverhuur']."'>
                </td>
                <td>
                    <input type='text' name='datumtot' value='".$data['datumtot']."'>
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

        $tabelData = '<table border="1" width="700px"><tr>
            <td>ID</td>
            <td>KlantID</td>
            <td>FietsID</td>
            <td>DatumVerhuur</td>
            <td>DatumTot</td>
            <td colspan="2">Opties</td>
        </tr>';
            $stmt = $pdo->query("SELECT * FROM verhuur");

            foreach ($stmt as $rij){
                $tabelData .= '<tr>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['ID'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['KlantID'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['FietsID'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['DatumVerhuur'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= $rij['DatumTot'];
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= '<a href="verhuringen.php?aktie=wijzigen&id='.$rij['ID'].'">Update</a>';
                    $tabelData .= '</td>';
                    $tabelData .= '<td>';
                        $tabelData .= '<a href="verhuringen.php?aktie=verwijder&id='.$rij['ID'].'">Delete</a>';
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