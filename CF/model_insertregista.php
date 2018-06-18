<?php
include 'DB_conn.php';
$nome=$_GET["nome"];
$cognome=$_GET["cognome"];
$paese=$_GET["paese"];
$data_nascita=$_GET["datanascita"];
$link=$_GET["link"];
$img=$_GET["img"];
try{
  $mioquery=$dbh->prepare("INSERT INTO `regista`(`id_regista`, `nome`, `cognome`, `paese`, `data_nascita`, `img_regista`, `link_wikipedia`) VALUES (NULL,:nome,:cognome,:paese,:data_nascita,:img,:link)");
  $mioquery->bindValue(":nome",$nome);
  $mioquery->bindValue(":cognome",$cognome);
  $mioquery->bindValue(":paese",$paese);
  $mioquery->bindValue(":data_nascita",$data_nascita);
  $mioquery->bindValue(":img",$img);  
  $mioquery->bindValue(":link",$link);
  $mioquery->execute();
  echo json_encode("Inserimento regista eseguito");
}
  catch (PDOexception $e){
    echo json_encode($e->getMessage());
  }



?>