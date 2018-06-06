<?php
include 'DB_conn.php';

$cognome=$_GET["cognome"];
$nome=$_GET["nome"];
$nickname=$_GET["nickname"];
$email=$_GET["email"];
$password=$_GET["password"]; 
$data_nascita=$_GET["data_nascita"];
$sesso=$_GET["sesso"];

$password=MD5($password); 

try{
  $mioquery=$dbh->prepare("INSERT INTO `checkfilm`.`utente` (`id_utente`, `nickname`, `nome`, `cognome`, `data_nascita`, `sesso`, `email`, `password`, `propic`, `privilegio`) VALUES (NULL, :nickname,:nome,:cognome,:data_nascita,:sesso,:email, :password,NULL,'user');");
  $mioquery->bindValue(":cognome",$cognome);
  $mioquery->bindValue(":nome",$nome);
  $mioquery->bindValue(":nickname",$nickname);
  $mioquery->bindValue(":email",$email);
  $mioquery->bindValue(":password",$password);  
  $mioquery->bindValue(":data_nascita",$data_nascita);
  $mioquery->bindValue(":sesso",$sesso);
  $mioquery->execute();
  echo json_encode(true);
}
  catch (PDOexception $e){
    echo json_encode($e->getMessage());
  }



?>