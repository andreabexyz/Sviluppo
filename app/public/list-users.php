<?php
$namePage="Lista utenti";
$pdo = new PDO('mysql:dbname=tutorial;host=mysql', 'tutorial', 'secret', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if(isset($_REQUEST['del'])){
    $idUser=$_REQUEST['del'];
    $query = $pdo->query("Delete from users WHERE idUser = ".$idUser."");
    header("Location: list-users.php ");
} 
?>
<!DOCTYPE html>
<html>
<head>
<?php include('classes/head.php'); ?>
</head>
<body>
    <div>
        <h1><?php echo $namePage; ?></h1>
    </div>
    <div>
        <form method="post" action="list-users.php">
            <input type="text" id="name" name="name" placeholder="Nome"></input>
            <input type="text" id="surname" name="surname" placeholder="Cognome"></input>
            <button class="button" type="submit" id="submit"><i class="bi bi-person-plus-fill"></i> Inserisci</button>
            <?php
            // Recupero i valori inseriti nel form
            if(isset($_POST['name'])){
                $nome = $_POST['name'];
            }
            if(isset($_POST['surname'])){
                $cognome = $_POST['surname'];
            }
            if(!isset($_POST['name']) || !isset($_POST['surname']) || ($nome == "")|| ($cognome == "") ){
            }else{
                $query2 = $pdo->query('Insert into users (name, surname) values("'.$nome.'","'.$cognome.'")');
                $msg="'<br>Nuovo utente inserito correttamente!";
                echo $msg;
            }
            ?>
        </form>
    </div>
    <br>
    <div>
        <table>
            <form action="list-users.php" method="post">
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <!--<th>Modifica</th>-->
                <th>Elimina</th>
            </tr>
                <?php
                // Leggo da db
                    $query = $pdo->query('Select * FROM users');
                    while($row = $query->fetch()){
                ?>
            <tr>
                <td>
                    <?php echo $row['name'];?>
                </td>
                <td>
                    <?php echo $row['surname'];?>
                </td>
                <!--<td>
                    <button type="submit" class="btn btn-success" value="<?php echo $row['idUser'];?>" id="add" name="add"><i class="bi bi-pencil-square"></i></button>
                </td>-->
                <td>
                    <button type="submit" class="btn btn-danger" value="<?php echo $row['idUser'];?>" id="del" name="del"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
                <?php 
                    }
                ?>
            </form>
        </table>
    </div>
</body>
<script></script>
</html>