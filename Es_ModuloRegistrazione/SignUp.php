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
   function modoSign() {
    if (document.getElementById('clientee').checked) {
        document.getElementById('scadPat').style.display = 'none';
        document.getElementById('numPat').style.display = 'none';

    }
    else {
        document.getElementById('scadPat').style.display = 'block';
        document.getElementById('numPat').style.display = 'block';
     }
}
 
</script>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6 " >
      <form action="conferma.php" method="post" name="mioform" onSubmit="return verifica()" >
        <div class="card " style="background-color:SkyBlue;">
          <div class="card-header">
            <h1 align="center"> Modulo di inscrizione</h1>
          </div>
          <div class="card-body">
             <!--Autista o cliente?--- modo --->
            <div class="form-group">            
            <label> Come vuoi registrarti? </label>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                <input type="radio" class="form-check-input" name="modo" id="clientee" value="Cliente" onclick="javascript:modoSign()" required> Cliente
              </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                <input type="radio" class="form-check-input" name="modo" id="autistaa" value="Autista" onclick="javascript:modoSign()" required> Autista
              </label>
                </div>            
              </div>
             <!--cognome-->
            <div class="form-group">
              <label>Cognome:</label>      
                <input type="text" class="form-control" placeholder="Cognome" name="cognome" autocomplete="off" required>           
            </div>
             <!--nome-->
            <div class="form-group">
              <label>Nome:</label>        
                <input type="text" class="form-control" placeholder="Nome" name="nome" autocomplete="off" required>             
            </div>
            <!--sesso-->
            <div class="form-group">
              <label>Sesso:</label>   </br>         
                <label class="checkbox-inline"> <input type="radio" name="sesso" value="M" required/> Maschile </label>
                <label class="checkbox-inline"> <input type="radio" name="sesso" value="F" required/> Femminile </label>           
            </div>
          <!--datanascita-->
           <div class="form-group">
              <label>Data di nascita: </label>
                <input type="date" class="form-control" name="datanascita" required>
              
            </div>
          <!--nazionalita-->
            <div class="form-group">
              <label>Nazionalita</label>
                <select class="form-control" name="nazionalita">     
                  <option value="Italiana">Italiana</option>
                  <option value="Peruviana">Peruviana</option>
                  <option value="Altro">Altro</option>
                </select>
            </div> 
          <!--numPat-->
            <div class="form-group" id="numPat"  style="display:none;"> 
              <label>Numero Patente: </label>
                <input type="text" class="form-control"  name="numPat"  autocomplete="off">
            </div>
          <!--scadPat-->
            <div class="form-group" id="scadPat" style="display:none;">
              <label>Scadenza: </label>
                <input type="date" class="form-control" name="scadPat">
              
            </div>
          <!--telefono-->
             <div class="form-group">
              <label>Telefono:</label>      
                <input type="text" class="form-control" name="telefono" autocomplete="off" required>
              
            </div>
          <!--username-->
            <div class="form-group">
              <label>Username</label>      
                <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
              
            </div>
          <!--email-->
            <div class="form-group">
              <label>Email: </label>      
                <input type="email" class="form-control" placeholder="example@gmail.com" name="email" autocomplete="off" required>              
            </div>
          <!--password-->
            <div class="form-group">
              <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div> 
          <!--confirm_password-->
            <div class="form-group">
              <label>Conferma password</label>
                <input type="password" class="form-control" placeholder="Conferma password" name="confirm_password" required>
            </div>
          </div>
          
           <div class="card-footer" align="center">

            <button type="reset" class="btn btn-secondary">Annulla</button>
            <button type="submit" class="btn btn-danger" name="btnConferma" onclick="verifica()">Conferma</button>

          </div>
         
         
      </form>

     
    </div>
  </div>
</body>
</html>