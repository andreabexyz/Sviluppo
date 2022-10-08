<?php
$msg="";
$servername = "mysql"; //set the servername
$username = "tutorial"; //set the server username
$password = "secret"; // set the server password (you must put password here if your using live server)
$dbname = "tutorial"; // set the table name

try {
    $pdo = new PDO('mysql:dbname='.$dbname.';host='.$servername.'', ''.$username.'', ''.$password.'', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(PDOException $e){
    $msg="Connessione al database fallita!<br>Contattare il tecnico.";
}
?>