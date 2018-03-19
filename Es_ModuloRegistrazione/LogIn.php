<!--FINIRE DI COMPLETARE IL LOGOUT CON $ROW=0 O =1--->
<?php
include 'conn.php';
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
  if (isset($_POST['btnLogin'])) {
    if (empty($_POST['LoginEmail']) || empty($_POST['LoginPassword'])) {
    $error = "Username or Password is invalid";
     }
    else{
       // Define $username and $password
       $user=$_POST['LoginEmail'];
       $pass=$_POST['LoginPassword'];
       $mioquery=$dbh->prepare("SELECT utente.ID FROM utente WHERE utente.email=:email AND utente.password=MD5(:password));");
       $mioquery->bindValue(":email",$user);
       $mioquery->bindValue(":password",$pass);
       $rows = mysql_num_rows($mioquery);
      if ($rows == 1) {
        $_SESSION['ID']=$rows['ID']; // Initializing Session
        header("location: Dashbboard.php"); // Redirecting To Other Page
        }
      else {
        $error = "Username or Password is invalid";
      }
  }
}

?>
</script>
  <html>

  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>

    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <form action="" method="post" name="formLogin">
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
                  <input type="password" class="form-control " placeholder="Password" name="LoginPassword" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="btnLogin">Entra</button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </body>
  </html>