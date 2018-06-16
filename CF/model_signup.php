<?php
include 'DB_conn.php';
$nickname=$_GET["nickname"];
$nome=$_GET["nome"];
$cognome=$_GET["cognome"];
$data_nascita=$_GET["data_nascita"];
$email=$_GET["email"];
$password=$_GET["password"]; 
$propic=$_GET["propic"]; 
$password=MD5($password); 

try{
  $mioquery=$dbh->prepare("INSERT INTO `checkfilm`.`utente` (`id_utente`, `nickname`, `nome`, `cognome`, `data_nascita`, `email`, `password`, `propic`, `privilegio`) VALUES (NULL, :nickname,:nome,:cognome,:data_nascita,:email, :password,:propic,'user');");
  $mioquery->bindValue(":cognome",$cognome);
  $mioquery->bindValue(":nome",$nome);
  $mioquery->bindValue(":nickname",$nickname);
  $mioquery->bindValue(":email",$email);
  $mioquery->bindValue(":password",$password);  
  $mioquery->bindValue(":data_nascita",$data_nascita);
    $mioquery->bindValue(":propic",$propic);
  $mioquery->execute();
  echo json_encode("Registrazione eseguita");
}
  catch (PDOexception $e){
    echo json_encode($e->getMessage());
  }



?>