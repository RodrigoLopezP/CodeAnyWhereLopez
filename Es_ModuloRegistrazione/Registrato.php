<?php
include 'conn.php';

$nome=$_REQUEST["nome"];
$cognome=$_REQUEST["cognome"];
$sesso=$_REQUEST["sesso"];
$nazionalita=$_REQUEST["nazionalita"];
$email=$_REQUEST["email"];
$patente=$_REQUEST["patente"];
$password=$_REQUEST["password"];


$mioquery=$dbh->prepare("INSERT INTO utente(Cognome, Nome, Sesso, Nazionalita, Patente, Email,password) VALUES(:cognome, :nome, :sesso,:nazionalita,:patente,:email,MD5(:password))");
$mioquery->bindValue(":cognome",$cognome);
$mioquery->bindValue(":nome",$nome);
$mioquery->bindValue(":sesso",$sesso);
$mioquery->bindValue(":nazionalita",$nazionalita);
$mioquery->bindValue(":email",$email);
$mioquery->bindValue(":patente",$patente);
$mioquery->bindValue(":password",$password);
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
            <form action="index.php" >
              <button class="btn" type="submit">
                  Chiudi
                </button>
            </form>

          </div>
        </div>
       

      </div>
    </div>

  </body>

  </html>