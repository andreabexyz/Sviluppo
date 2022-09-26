<?php
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if(isset($_REQUEST['idUser'])){
    $idUser=$_REQUEST['idUser'];
    $query = $pdo->query("Delete from users WHERE idUser = ".$idUser."");
    header("Location: list-users.php ");
}
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
            <form action="list-users.php" method="post">
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Elimina</th>
            </tr>
                <?php
                // Leggo da db
                    $query = $pdo->query('Select * FROM users');
                    while($row = $query->fetch()){
                ?>
            <tr>
                <td>
                    <?php echo $row['name'];?>
                </td>
                <td>
                    <?php echo $row['surname'];?>
                </td>
                <td>
                    <button type="submit" class="btn btn-danger" value="<?php echo $row['idUser'];?>" id="idUser" name="idUser"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
                <?php 
                    }
                ?>
            </form>
        </table>
    </div>
</body>
<script></script>
</html>