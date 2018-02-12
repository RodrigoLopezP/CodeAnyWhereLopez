<?php
$nome=$_REQUEST["nome"];
$cognome=$_REQUEST["cognome"];
$sesso=$_REQUEST["sesso"];
$nazionalita=$_REQUEST["nazionalita"];
$email=$_REQUEST["email"];
$patente=$_REQUEST["patente"];

$conn="mysql: host=localhost;dbname=miodb_Lopez";
$pass="481516";
$user="root";

try {
    $dbh=new PDO($conn,$user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
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
            <?php echo $nome?>
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


    </div>
  </div>

</body>

</html>