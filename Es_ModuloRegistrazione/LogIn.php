<?php
include 'conn.php';
 // Starting Session
session_start(); // Initializing Session
if (isset($_POST['btnLogin'])) {       
    //Prendo la email e la password dal form
       $user=$_POST['LoginEmail'];    
       $pass=$_POST['LoginPassword'];
    //Converto la password in MD5
       $pass=MD5($pass);   
       $mioquery=$dbh->prepare("SELECT * FROM Passeggero WHERE Passeggero.email=:email AND Passeggero.password=:password;"); //query
       $mioquery->bindValue(":email",$user);
       $mioquery->bindValue(":password",$pass);
    //Se la query si esegue con successo...
      if($mioquery->execute()){ 
        $cuenta = $mioquery->rowCount(); //conta le righe che vengono come risultato della query
        $row=$mioquery->fetch(); 
          if ($cuenta == 1) {
              $_SESSION['modo']='passeggero';
              $_SESSION['ID']=$row['id']; 
              $_SESSION['cognome']=$row['cognome'];
              $_SESSION['nome']=$row['nome'];
              $_SESSION['username']=$row['username'];
              $_SESSION['email']=$row['email'];             
              $_SESSION['telefono']=$row['telefono'];
              $_SESSION['data_nascita']=$row['data_nascita'];
              $_SESSION['sesso']=$row['sesso'];
              $_SESSION['nazionalita']=$row['nazionalita'];
              header("location: Dashboard.php"); // Redirecting To Other Page 
            else{
               echo "<script>alert('')</script>";
            }
          }
     }       //Se non c'è tra i clienti
     else{
        $mioquery=$dbh->prepare("SELECT * FROM Autista WHERE Autista.email=:email AND Autista.password=:password;"); //query
        $mioquery->bindValue(":email",$user);
        $mioquery->bindValue(":password",$pass);
        //Se la query si esegue con successo...
        if($mioquery->execute()){ 
        $cuenta = $mioquery->rowCount(); //conta le righe che vengono come risultato della query
        $row=$mioquery->fetch(); 
            if ($cuenta == 1) {
                $_SESSION['modo']='passeggero';
                $_SESSION['ID']=$row['id']; 
                $_SESSION['cognome']=$row['cognome'];
                $_SESSION['nome']=$row['nome'];
                $_SESSION['username']=$row['username'];
                $_SESSION['email']=$row['email'];             
                $_SESSION['telefono']=$row['telefono'];
                $_SESSION['data_nascita']=$row['data_nascita'];
                $_SESSION['sesso']=$row['sesso'];
                $_SESSION['nazionalita']=$row['nazionalita'];
                $_SESSION['numero_patente']=$row['numero_patente'];
                $_SESSION['scadenza_patente']=$row['scadenza_patente'];
                header("location: Dashboard.php"); // Redirecting To Other Page        
            }
        }
          //Se la email e la password non si trovano neanche tra gli Autisti
        else{
            session_destroy();
            echo "<script>alert('Email o password errata);window.location.href='LogIn.php';</script>";
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