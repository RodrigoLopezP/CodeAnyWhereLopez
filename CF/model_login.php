<?php
include 'DB_conn.php';     
//$email=$_GET["login_email"];     //prendo la email dal getJSON
//$pass=$_GET["login_password"];  //prendo la password dal getJSON 
//Converto la password in MD5
$email="prova@gmail.com";
$pass="ciao";
$pass=MD5($pass);   
$array_utente=array();

try{
      $mioquery=$dbh->prepare("SELECT * FROM utente WHERE utente.email=:email AND utente.password=:password;"); //query
      $mioquery->bindValue(":email",$email);
      $mioquery->bindValue(":password",$pass);
      //Se la query si esegue con successo...
      $mioquery->execute();
      $cuenta = $mioquery->rowCount(); //conta le righe che vengono come risultato della query
      $row=$mioquery->fetch(); 
      if ($cuenta == 1) {
              $array_utente[]=$row['id_utente']; 
              $array_utente[]=$row['cognome'];
              $array_utente[]=$row['nome'];
              $array_utente[]=$row['nickname'];
              $array_utente[]=$row['email'];             
              $array_utente[]=$row['data_nascita'];
              $array_utente[]=$row['password'];
        echo    json_encode($array_utente);
       
      }
      else{
            echo   json_encode("errore");
      }          
}
 catch (PDOexception $e){
    echo json_encode("errore");
  }

?>