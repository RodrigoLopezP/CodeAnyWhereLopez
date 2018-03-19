<!--FINIRE DI COMPLETARE IL LOGOUT CON $ROW=0 O =1--->
<?php
include 'conn.php';
function Login(){
  
if(isset($SESSION['ID'])){
  echo "<script>alert('Utente già loggato');</script>";
}
else{
  $email=$_POST("LoginEmail");
  $pass=$_POST("LoginPassword");  
  $mioquery=$dbh->prepare("SELECT utente.ID FROM utente WHERE utente.Email==:email AND utente.Password==MD5(:password)");
  $mioquery->bindValue(":email",$email);
  $mioquery->bindValue(":password",$pass);
  if($mioquery->execute()){
    $row=$mioquery->fetch();
    if($mioquery->rowCount()==1){
      session_start();
      $ciao=$row['ID'];
      $_SESSION['ID_user']=$ciao;
      return true;
    }
    else {
         echo "<script>alert('Errore');</script>";
      return false;
    }
      }
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
        <form action="Dashboard.php" method="post" OnSubmit=return Login()>
          <div class="card" style="background-color:MediumTurquoise;">
            <div class="card-header">
              <h1 align="center"> Log In</h1>
            </div>
            <div class="card-body">

              <div class="form-group row">
                <legend class="col-md-3 col-sm-12 col-form-label">Email</legend>
                <div class="col-md-8 col-sm-12">
                  <input type="email" class="form-control " placeholder="Email" name="LoginEmail" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group row">
                <legend class="col-md-3 col-sm-12 col-form-label">Password</legend>
                <div class="col-md-8 col-sm-12">
                  <input type="password" class="form-control " placeholder="Password" name="LogiPassword" autocomplete="off" required>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button onclick="Login()">Entra</button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </body>
  </html>