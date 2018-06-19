<?php
  include 'DB_conn.php';
$stringquery="UPDATE `film` SET `nome_film`=:nome,`id_regista`=:regista,`anno`=:anno,`genere`=:genere,`link_wiki`=:link,`picfilm`=:img,`durata`=:durata WHERE  `id_film`=:id_film";
$id_film=$_GET["id_film"];
$nome=$_GET["nome"];
$regista=$_GET["regista"];
$anno=$_GET["anno"];
$link=$_GET["link"];
$durata=$_GET["durata"];
$img=$_GET["img"];
$genere=$_GET["genere"];
try{
  $mioquery=$dbh->prepare($stringquery);
  $mioquery->bindValue(":id_film",$id_film);
  $mioquery->bindValue(":nome",$nome);
  $mioquery->bindValue(":regista",$regista);
  $mioquery->bindValue(":anno",$anno);
  $mioquery->bindValue(":link",$link);
  $mioquery->bindValue(":durata",$durata);  
  $mioquery->bindValue(":img",$img);
  $mioquery->bindValue(":genere",$genere);
  $mioquery->execute();
  echo json_encode("Modifica film eseguita");
}
  catch (PDOexception $e){
    echo json_encode($e->getMessage());
  }
?>