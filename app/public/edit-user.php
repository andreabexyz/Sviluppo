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
  <li><a href="index.php">Home</a></li>
  <li><a href="list-users.php">Lista utenti</a></li>
  <li><a href="edit-user.php">Inserisci utenti</a></li>
</ul>
<br>
<h1>Inserisci utenti</h1>
    <form method="post" action="index.php">
        <input type="text" id="name" name="name" placeholder="Nome">*</input>
        <input type="text" id="surname" name="surname" placeholder="Cognome">*</input>
        <input type="text" id="nickName" name="nickName" placeholder="Nickname">*</input>
        <input type="submit" id="submit" value="Inserisci"></input>
        <?php
        // Recupero i valori inseriti nel form
        if(isset($_POST['name'])){
            $nome = $_POST['name'];
        }
        if(isset($_POST['surname'])){
            $cognome = $_POST['surname'];
        }
        if(isset($_POST['nickName'])){
            $soprannome = $_POST['nickName'];
        }

        if(!isset($nome) || !isset($cognome) || !isset($soprannome)){
            echo '<br>Tutti i campi * sono obbligatori!';    
        }else{
            $query2 = $pdo->query('Insert into users (name, surname, nickName) values("'.$nome.'","'.$cognome.'","'.$soprannome.'")');
            echo("<br>Nuovo utente inserito correttamente!<br>");
        }
        ?>
    </form>
</body>
<script>
</script>
</html>