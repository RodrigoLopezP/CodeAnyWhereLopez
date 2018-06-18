<?php
include 'DB_conn.php';
$nome=$_GET["nome"];
$regista=$_GET["regista"];
$anno=$_GET["anno"];
$link=$_GET["link"];
$durata=$_GET["durata"];
$img=$_GET["img"];
$genere=$_GET["genere"];
try{
  $mioquery=$dbh->prepare("INSERT INTO `film`(`id_film`, `nome_film`, `id_regista`, `anno`,`genere` , `link_wiki`, `voto_medio`, `picfilm`, `durata`) VALUES (NULL,:nome,:regista,:anno,:genere ,:link,NULL,:img,:durata)");
  $mioquery->bindValue(":nome",$nome);
  $mioquery->bindValue(":regista",$regista);
  $mioquery->bindValue(":anno",$anno);
  $mioquery->bindValue(":link",$link);
  $mioquery->bindValue(":durata",$durata);  
  $mioquery->bindValue(":img",$img);
    $mioquery->bindValue(":genere",$genere);
  $mioquery->execute();
  echo json_encode("Inserimento film eseguito");
}
  catch (PDOexception $e){
    echo json_encode($e->getMessage());
  }



?>