<?php
$nome=$_REQUEST["nome"];
$cognome=$_REQUEST["cognome"];
$sesso=$_REQUEST["sesso"];
$nazionalita=$_REQUEST["nazionalita"];
$email=$_REQUEST["email"];
$patente=$_REQUEST["patente"];

$conn='mysql:host=127.0.0.1; dbname=miodb_Lopez;' ;
$user='root';
$pass='481516';
try {
    $dbh=new PDO($conn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Errore nella connessione: ' . $e->getMessage();
  die();
}
$mioquery=$dbh->prepare("INSERT INTO utente(Cognome, Nome, Sesso, Nazionalita, Patente, Email) VALUES(:cognome, :nome, :sesso,:nazionalita,:patente,:email)");

$mioquery->bindValue(":cognome",$cognome);
$mioquery->bindValue(":nome",$nome);
$mioquery->bindValue(":sesso",$sesso);
$mioquery->bindValue(":nazionalita",$nazionalita);
$mioquery->bindValue(":email",$email);
$mioquery->bindValue(":patente",$patente);

if(!$mioquery->execute()){
  echo "Non è stato inserito";
}

  

?>
  <html>

  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <div class="card" style="background-color:gold;">
          <div class="card-header">
            <h1>
              Esito registrazione
            </h1>
          </div>
          <div class="card-body">
            <h4 align="center">
              Dati correttamente registrati
            </h4>
          </div>
          <div class="card-footer" align="center">

            <button class="btn">
                  Chiudi
                </button>
          </div>
        </div>
            <table class="table table-sm">
               <?php     
              $stringa="SELECT * FROM utente";
      $query2=$dbh->prepare($stringa);
      if($query2->execute()){
        echo ' <thead> <tr> <th scope="col">ID utente</th><th scope="col">Cognome</th><th scope="col">Nome</th><th scope="col">Sesso</th><th scope="col">Nazionalita</th><th scope="col">Patente</th><th scope="col">Email</th> </tr></thead> <tbody>';
        while($row=$query2->fetch()){
          echo '<tr> <td>'. $row['ID'].'</td><td> '. $row['Cognome'].'</td><td> '.$row['Nome'].'</td><td> '.$row['Sesso'].'</td><td> '.$row['Nazionalita'].' </td><td>'.$row['Patente'].'</td><td> '.$row['Email'].'</td></tr>';
        } 
        echo '</tbody>';
      }
            ?></table>

      </div>
    </div>

  </body>

  </html>