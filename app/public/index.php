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
<?php include('classes/head.php'); ?>
</head>
<body>
<?php include('classes/navbar.php'); ?>
<br>
<h1>Benvenuto sul mio sito!</h1>
<img src="img/fotoProfilo.JPG" width="150" height="150">
</body>
<script>
</script>
</html>