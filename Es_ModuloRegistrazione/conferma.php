<?php
$nome=$_REQUEST["nome"];
$cognome=$_REQUEST["cognome"];
$sesso=$_REQUEST["sesso"];
$nazionalita=$_REQUEST["nazionalita"];
$email=$_REQUEST["email"];
if(isset($_REQUEST["patenteA"]) and !isset($_REQUEST["patenteB"])){
 $patente=$_REQUEST["patenteA"];
}
elseif(isset($_REQUEST["patenteB"]) and !isset($_REQUEST["patenteA"])){
   $patente=$_REQUEST["patenteB"];
}
elseif(isset($_REQUEST["patenteA"]) and isset($_REQUEST["patenteA"])){
   $patente=$_REQUEST["patenteA"]." e ".$_REQUEST["patenteB"];
}  
else{
   $patente="nessuna";
   }

?>
  <html>

  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body >
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4 " align="center" >



        <form action="Registrato.php" method="post" >
          <div class="card" style="background-color:slategray; color:white;">
            <div class="card-header">
              <h1>Riepilogo dati </h1>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li>Cognome: 
                  <?php echo $cognome ?>
                </li>
                <li>Nome:
                  <?php echo $nome ?> </li>
                <li>Sesso:
                  <?php echo $sesso ?> </li>
                <li>Patente:
                  <?php echo $patente ?> </li>
                <li>Email:
                  <?php echo $email ?> </li>
              </ul>

            </div>
            <div class="card-footer">
              <form action="index.php" method="post">
                <button class="btn btn-secondary " type="submit">        Correggi        </button>
              </form>
              <button type="submit" class="btn btn-success ">        Registra        </button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </body>

  </html>