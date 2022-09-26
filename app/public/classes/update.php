<?php
    $idUser=$_GET['idUser'];
    $idUser=$_GET['name'];
    $idUser=$_GET['surname'];
    try {
        $pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        // sql to delete a record
        $query = $pdo->query("Update users set (name=".$nome.", surname".$cognome.") where id=".$idUser."");
        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }

    $conn = null;
    ?>    