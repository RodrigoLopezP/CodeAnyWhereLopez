<?php
$nome=$_REQUEST["nome"];
$cognome=$_REQUEST["cognome"];
$sesso=$_REQUEST["sesso"];
$nazionalita=$_REQUEST["nazionalita"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
if(isset($_REQUEST["patenteA"]) and !isset($_REQUEST["patenteB"])){
 $patente='A';
}
elseif(isset($_REQUEST["patenteB"]) and !isset($_REQUEST["patenteA"])){
   $patente='B';
}
elseif(isset($_REQUEST["patenteA"]) and isset($_REQUEST["patenteA"])){
   $patente='A e B';
}  
else{
   $patente="Nessuna";
   }

?>
<script>
  function goBack(){
      window.history.go(-1);  
  }
</script>
  <html>

  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4 " align="center">

        <form action="Registrato.php" method="post">
          <div class="card" style="background-color:slategray; color:white;">
            <div class="card-header">
              <h1>Riepilogo dati </h1>
            </div>
            <div class="card-body">
              <table>
                <tr>
                  <td>Cognome:</td>
                  <td>
                    <?php echo $cognome ?>
                  </td>
                </tr>
                <tr>
                  <td>Nome:</td>
                  <td>
                    <?php echo $nome ?>
                  </td>
                </tr>
                <tr>
                  <td>Nazionalita:</td>
                  <td>
                    <?php echo $nazionalita ?>
                  </td>
                </tr>
                <tr>
                  <td>Sesso:</td>
                  <td>
                    <?php echo $sesso ?>
                  </td>
                </tr>
                <tr>
                  <td>Patente:</td>
                  <td>
                    <?php echo $patente ?>
                  </td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td>
                    <?php echo $email ?>
                  </td>
                </tr>
              </table>
              <input type="hidden" name="cognome" value="<?php echo $cognome ?>">
              <input type="hidden" name="nome" value="<?php echo $nome ?>">
              <input type="hidden" name="sesso" value="<?php echo $sesso ?>">
              <input type="hidden" name="nazionalita" value="<?php echo $nazionalita ?>">
              <input type="hidden" name="patente" value="<?php echo $patente ?>">
              <input type="hidden" name="email" value="<?php echo $email ?>">
              <input type="hidden" name="password" value="<?php echo $password ?>">
            </div>
            <div class="card-footer">
           
                <button type="button" class="btn btn-secondary" onclick = "goBack()">        Correggi        </button>
             
              <button type="submit" class="btn btn-success ">        Registra        </button>
            </div>
          </div>
        </form>

      </div>
    </div>

  </body>

  </html>