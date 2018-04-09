<?php
$modo=$_REQUEST["modo"];
$cognome=$_REQUEST["cognome"];
$nome=$_REQUEST["nome"];
$sesso=$_REQUEST["sesso"];
$datanascita=$_REQUEST["datanascita"];
$nazionalita=$_REQUEST["nazionalita"];
if($modo=="Autista"){
  $numPat=$_REQUEST["numPat"];
  $scadPat=$_REQUEST["scadPat"];
}
$telefono=$_REQUEST["telefono"];
$username=$_REQUEST["username"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];

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
                  <td>Modo:</td>
                  <td>
                    <?php echo $modo ?>
                  </td>
                </tr>
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
                  <td>Email:</td>
                  <td>
                    <?php echo $email ?>
                  </td>
                </tr>
                <tr>
                  <td>Data di nascita:</td>
                  <td>
                    <?php echo $datanascita ?>
                  </td>
                </tr>
                <tr>
                  <td>Telefono:</td>
                  <td>
                    <?php echo $telefono ?>
                  </td>
                </tr>
                <tr>
                  <td>Username:</td>
                  <td>
                    <?php echo $username ?>
                  </td>
                </tr>
                <?php if($modo=="Autista"){
                 echo "<tr><td>Numero patente:</td><td>".$numPat."</td></tr><tr><td>Scadenza patente:</td><td>".$scadPat."</td></tr>";
                    }?>
              </table>
              <input type="hidden" name="cognome" value="<?php echo $cognome ?>">
              <input type="hidden" name="nome" value="<?php echo $nome ?>">
              <input type="hidden" name="sesso" value="<?php echo $sesso ?>">
              <input type="hidden" name="nazionalita" value="<?php echo $nazionalita ?>">
              <input type="hidden" name="email" value="<?php echo $email ?>">
              <input type="hidden" name="password" value="<?php echo $password ?>">
              <input type="hidden" name="telefono" value="<?php echo $telefono ?>">
              <input type="hidden" name="username" value="<?php echo $username ?>">
              <input type="hidden" name="datanascita" value="<?php echo $datanascita ?>">
              <input type="hidden" name="modo" value="<?php echo $modo ?>">
              
              <input type='hidden' name='numPat' value='<?php echo $numPat ?>"'>  
              <input type='hidden' name='scadPat' value='<?php echo $scadPat ?>"'>
            
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