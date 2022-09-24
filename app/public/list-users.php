<?php
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// Controllo connessione db
/*if (!$pdo) {
    echo("Connessione fallita.\n<br><br>");
}else{
    echo("Connessione riuscita.\n<br><br>");
}*/
$name="";
$surname="";
$nickName="";
?>
<!DOCTYPE html>
<html>
<head>
<?php include('classes/head.php'); ?>
</head>
<body>
<?php include('classes/navbar.php'); ?>
    <br>
    <h1>Elenco utenti</h1>
    <div>
        <table>
            <form  method="delete" action=" " onSubmit="window.location.reload()">
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Modifica/Elimina</th>
            </tr>
                <?php
                // Leggo da db
                    $query = $pdo->query('Select * FROM users');
                    while($row = $query->fetch()){
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['surname']; ?></td>
                    <td>
                        <a type="submit" class="btn btn-success" id="UPD" value="<?php echo $row['idUser']; ?>"><i class="bi bi-pencil-fill"></i></a>
                        <a type="submit" name="delete_button"  onSubmit="return confirm(\'Vuoi davvero eliminare l'utente '<?php echo $row['idUser']; ?>'?\');" type="submit" class="btn btn-danger" id="DEL" value="<?php echo $row['idUser']; ?>"><i class="bi bi-trash"></i></a>

                    </td>
                </tr>
                <?php 
                    }
                ?>
            </form>
        </table>
    </div>
</body>
<script>
</script>
</html>