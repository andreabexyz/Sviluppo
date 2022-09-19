<?php
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Controllo connessione db
if (!$pdo) {
    echo("Connessione fallita.\n<br><br>");
}else{
    echo("Connessione riuscita.\n<br><br>");
}

$query = $pdo->query('select nickname from users');

$count=1;

while($row = $query->fetch()){
    echo ($count.'° nickname: ' . $row['nickname'] . '<br>');   
    ++$count;
}