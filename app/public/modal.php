<!DOCTYPE html>
<html>
<head>
  <?php include('classes/head.php'); ?>
</head>
<body>

  <h2>Large Modal</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form method="post" action="users.php">
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
          </form>        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</body>
</html>
