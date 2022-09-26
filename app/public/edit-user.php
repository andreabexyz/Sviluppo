<?php
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>
<!DOCTYPE html>
<html>
<head>
<?php include('classes/head.php'); ?>
</head>
<body>
    <br>
    <h1>Inserisci utenti</h1>
    <div>
        <form method="post" action="edit-user.php">
            <input type="text" id="name" name="name" placeholder="Nome">*</input>
            <input type="text" id="surname" name="surname" placeholder="Cognome">*</input>
            <input class="button" type="submit" id="submit" value="Inserisci"></input>
            <?php
            // Recupero i valori inseriti nel form
            if(isset($_POST['name'])){
                $nome = $_POST['name'];
            }
            if(isset($_POST['surname'])){
                $cognome = $_POST['surname'];
            }

            if(!isset($nome) || !isset($cognome) || ($nome == "")|| ($cognome == "") ){
                echo '<br>Tutti i campi * sono obbligatori!';    
            }else{
                $query2 = $pdo->query('Insert into users (name, surname) values("'.$nome.'","'.$cognome.'")');
                echo("<br>Nuovo utente inserito correttamente!<br>");
            }
            ?>
        </form>
    </div>
</body>
<footer>
</footer>
<script>
</script>
</html>