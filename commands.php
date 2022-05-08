<?php

    include("connect.php");

    if(isset($_POST["save"]))
    {
        $MerkID = $_POST["MerkID"];
        $Type = $_POST["Type"];
        $Maat = $_POST["Maat"];
        $DH = $_POST["DH"];
        $Prijs = $_POST["Prijs"];
        $StatusID = $_POST["StatusID"];

        $sql = "INSERT INTO fiets (MerkID, Type, Maat, DamensHeren, Prijs, StatusID)
                    VALUES (?, ?, ?, ?, ?, ?);";
                    $pdo->prepare($sql)->execute([$MerkID, $Type, $Maat, $DH, $Prijs, $StatusID]);
    }

?>