<?php
include 'conn.php';

?>
<script type="text/javascript">
 function verifica(mioform){
   if(document.mioform.password.value!=document.mioform.confirm_password.value){
   alert("ERRORE: password non coincidenti");
     return false;
   }
   else
     return true;
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
    <div class="col-md-4 " >



      <form action="conferma.php" method="post" name="mioform" onSubmit="return verifica() " >
        <div class="card" style="background-color:MediumTurquoise;">
          <div class="card-header">
            <h1 align="center"> Modulo di inscrizione</h1>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <legend class="col-3 col-form-label">Cognome</legend>
              <div class="col-9">
                <input type="text" class="form-control " placeholder="Cognome" name="cognome" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group row">
              <legend class="col-3 col-form-label">Nome</legend>
              <div class="col-9">
                <input type="text" class="form-control" placeholder="Nome" name="nome" autocomplete="off" required>
              </div>
            </div>
            <div class="form-group row">
              <legend class="col-3 col-form-label">Sesso</legend>
              <div class="col-9">
                <label class="checkbox-inline"> <input type="radio" name="sesso" value="M" required/> Maschile </label>
                <label class="checkbox-inline"> <input type="radio" name="sesso" value="F" required/> Femminile </label>
              </div>
            </div>
            <div class="form-group row">
              <legend class="col-3 col-form-label">
                Nazionalita
              </legend>
              <div class="col-9">
                <select class="form-control" name="nazionalita">     
          <option value="Italiana">Italiana</option>
          <option value="Peruviana">Peruviana</option>
          <option value="Altro">Altro</option>
          </select>
              </div>
            </div>
            <div class="form-group row">
              <legend class="col-3 col-form-label">
                Patente:
              </legend>
              <div class="col-9">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="patenteA" > cat. A  
              </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="patenteB"> cat. B 
              </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <legend class="col-3 col-form-label">Email</legend>
              <div class="col-9">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
              </div>
            </div>
            <div class="form-group row">
              <legend class="col-4 col-form-label">Password</legend>
              <div class="col-7">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>
            </div>
             <div class="form-group row">
              <legend class="col-4 col-form-label">Conferma password</legend>
              <div class="col-7">
                <input type="password" class="form-control" placeholder="Conferma password" name="confirm_password" required>
              </div>
            </div>
          </div>
          
          </div>
          <div class="card-footer" align="center">

            <button type="reset" class="btn btn-secondary">Annulla</button>
            <button type="submit" class="btn btn-danger" name="btnConferma" onclick="verifica()">Conferma</button>

          </div>
           </div>
      </form>

     
    </div>
  </div>
</body>

</html>