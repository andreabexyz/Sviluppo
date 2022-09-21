<?php
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// Controllo connessione db
/*if (!$pdo) {
    echo("Connessione fallita.\n<br><br>");
}else{
    echo("Connessione riuscita.\n<br><br>");
}*/
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
<h1>Benvenuto sul mio sito!</h1>
<img src="img/fotoProfilo.JPG" width="300" height="300">
</body>
<script>
</script>
</html>