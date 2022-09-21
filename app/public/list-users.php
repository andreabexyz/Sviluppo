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
<title>Sviluppo</title>
<link rel="stylesheet" href="style\style.css">
</head>
<body>
<ul>
  <li id="logo">BESSO Web Develop Space</li>
  <li><a href="edit-user.php">Inserisci utenti</a></li>
  <li><a href="list-users.php">Lista utenti</a></li>
  <li><a href="index.php">Home</a></li>
</ul>
<br>
<h1>Elenco utenti</h1>
<div>
    <table>
        <tr>
            <th>Numero</th>
            <th>Nome</th>
            <th>Cognome</th>
        </tr>
            <?php
            // Leggo da db
                $query = $pdo->query('Select * FROM users');
                
                while($row = $query->fetch()){
            ?>
            <tr>
                <td><?php echo $row['idUser']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['surname']; ?></td>
            </tr>
            <?php 
                }
            ?>
    </table>
</div>
</body>
<script>
</script>
</html>