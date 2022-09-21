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
  <li><a href="index.php">Home</a></li>
  <li><a href="list-users.php">Lista utenti</a></li>
  <li><a href="edit-user.php">Inserisci utenti</a></li>
</ul>
<br>
<h1>Elenco utenti</h1>
<?php
// Leggo da db
    $query = $pdo->query('Select idUser, nickname FROM users');
    
    while($row = $query->fetch()){
        echo (''. $row['idUser'].'° nickname: '. $row['nickname'].'<br>');   
    }
?>
</body>
<script>
</script>
</html>