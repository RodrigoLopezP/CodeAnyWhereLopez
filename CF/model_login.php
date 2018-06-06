<?php
include 'DB_conn.php';

session_start(); // Initializing Session
if (isset($_POST['btnLogin'])) {       
    //Prendo la email e la password dal form
       $user=$_POST['LoginEmail'];     //prendo l'utente dal form
       $pass=$_POST['LoginPassword'];  //prendo la password dak form 
  //Converto la password in MD5
       $pass=MD5($pass);   
       $mioquery=$dbh->prepare("SELECT * FROM utente WHERE utente.email=:email AND utente.password=:password;"); //query
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
              header("location:index.html"); // Redirecting To Other Page 
            else{
               echo "<script>alert('')</script>";
            }
          }
     }       //Se non c'è tra i clienti
     else{
                   session_destroy();
            echo "<script>alert('Email o password errata);window.location.href='LogIn.php';</script>";

  }
}

?>