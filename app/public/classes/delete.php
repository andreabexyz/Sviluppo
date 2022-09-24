<?php
    $idUser=$_GET['idUser'];
    try {
        $pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        // sql to delete a record
        echo $idUser;
        $query = $pdo->query("Delete from users  WHERE idUser = ".$idUser."");

        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }

    $conn = null;
    ?>    