<?php
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// $query = $pdo->query('SHOW VARIABLES like "version');
$query = $pdo->query('select nickname from users ');

$row = $query->fetch();

echo 'Mio nickname: ' . $row['nickname'];