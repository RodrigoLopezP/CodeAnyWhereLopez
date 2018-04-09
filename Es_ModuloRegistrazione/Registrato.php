<?php
include 'conn.php';
$modo=$_REQUEST["modo"];
$cognome=$_REQUEST["cognome"];
$nome=$_REQUEST["nome"];
$username=$_REQUEST["username"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
$telefono=$_REQUEST["telefono"];
$data_nascita=$_REQUEST["datanascita"];
$sesso=$_REQUEST["sesso"];
$nazionalita=$_REQUEST["nazionalita"];
 $scadPat=$_REQUEST["scadPat"];
 $numPat=$_REQUEST["numPat"];
if($modo=="Autista"){
try{
  $mioquery=$dbh->prepare("INSERT INTO Autista(cognome, nome,username,email,password,telefono,data_nascita,sesso,nazionalita,numero_patente,scadenza_patente) VALUES(:cognome,:nome,:username,:email,MD5(:password),:telefono,:data_nascita,:sesso,:nazionalita,:numero_patente,:scadenza_patente)");
  $mioquery->bindValue(":cognome",$cognome);
  $mioquery->bindValue(":nome",$nome);
  $mioquery->bindValue(":username",$username);
  $mioquery->bindValue(":email",$email);
  $mioquery->bindValue(":password",$password);  
  $mioquery->bindValue(":telefono",$telefono);
  $mioquery->bindValue(":data_nascita",$data_nascita);
  $mioquery->bindValue(":sesso",$sesso);
  $mioquery->bindValue(":nazionalita",$nazionalita);
  $mioquery->bindValue(":numero_patente",$numPat);
  $mioquery->bindValue(":scadenza_patente",$scadPat);
  if(!$mioquery->execute()){
    echo "Non è stato inserito"; 
  }
}
  catch (PDOexception $e){
    echo "<script>alert('PDOexception Autista')</script>";
  }
}
else{
  try{
  $mioquery=$dbh->prepare("INSERT INTO Passeggero(cognome, nome,username,email,password,telefono,data_nascita,sesso,nazionalita) VALUES(:cognome,:nome,:username,:email,MD5(:password),:telefono,:data_nascita,:sesso,:nazionalita)");
  $mioquery->bindValue(":cognome",$cognome);
  $mioquery->bindValue(":nome",$nome);
  $mioquery->bindValue(":username",$username);
  $mioquery->bindValue(":email",$email);
  $mioquery->bindValue(":password",$password);  
  $mioquery->bindValue(":telefono",$telefono);
  $mioquery->bindValue(":data_nascita",$data_nascita);
  $mioquery->bindValue(":sesso",$sesso);
  $mioquery->bindValue(":nazionalita",$nazionalita);
  if(!$mioquery->execute()){
    echo "Non è stato inserito";
    }
  }
  catch (PDOexception $e){   
     echo $e->getMessage();
    echo "<script>alert('PDOexception Cliente')</script>";
  }
  
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