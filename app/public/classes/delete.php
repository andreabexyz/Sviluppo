<?php
    if(isset($_REQUEST['del'])){
        $idUser=$_REQUEST['del'];
        $query = $pdo->query("Delete from users WHERE idUser = ".$idUser."");
        header("Location: users.php ");
    }
    ?>    