<?php
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Controllo connessione db
if (!$pdo) {
    echo("Connessione fallita.\n<br><br>");
}else{
    echo("Connessione riuscita.\n<br><br>");
}
$name="";
$surname="";
$nickName="";

?>
<!DOCTYPE html>
<html>
<head>
<title>Sviluppo</title>
</head>
<body>
<h1>Lettura dal database Sviluppo</h1>
<?php
// Leggo da db
    $query = $pdo->query('Select idUser, nickname FROM users');
    
    while($row = $query->fetch()){
        echo (''. $row['idUser'].'° nickname: '. $row['nickname'].'<br>');   
    }


?>
<h1>Scrittura sul database Sviluppo</h1>
    <form method="post" action="index.php">
        <input type="text" id="name" name="name" placeholder="Nome"></input>
        <input type="text" id="surname" name="surname" placeholder="Cognome"></input>
        <input type="text" id="nickName" name="nickName" placeholder="Nickname"></input>
        <input type="submit" id="submit" value="Aggiungi"></input>
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
            echo '<br>Tutti i campi del modulo sono obbligatori!';    
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