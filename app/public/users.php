<?php
$namePage="Lista utenti";
include('classes/connOpen.php');
if(isset($_REQUEST['del'])){
    $idUser=$_REQUEST['del'];
    $query = $pdo->query("Delete from users WHERE idUser = ".$idUser."");
    header("Location: users.php ");
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include('classes/head.php'); ?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php if(!$msg){?>
    <div>
        <h1><?php echo $namePage; ?></h1>
    </div>
    <div class="container">
        <form method="post" action="users.php">
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
        <div class="container">
            <table>
                <form action="users.php" method="post">
                <tr>
                    <th class="col-4">Nome</th>
                    <th class="col-4">Cognome</th>
                    <th class="col-2">Modifica</th>
                    <th class="col-2">Elimina</th>
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
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="bi bi-pencil-square"></i></button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">   
                                        <div class="col align-self-center">
                                            <h3 class="modal-title" > Modifica Utente: <?php echo ("".$row['name']." ".$row['surname'].""); ?></h3>
                                        </div>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body"> 
                                        <input type="text" id="name" name="name" placeholder="Nome"></input>
                                        <input type="text" id="surname" name="surname" placeholder="Cognome"></input>
                                        <button class="button" type="submit" id="submit"><i class="bi bi-check-square"></i> Modifica</button>
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
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"> Annulla</button>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </td>
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
    </div>
    <?php }else{ echo ('<h3 style="text-align:center">'.$msg.'</h3>');} ?>
</body>
<script></script>
</html>