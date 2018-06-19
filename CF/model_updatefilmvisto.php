<?php
  include 'DB_conn.php';
$stringquery="UPDATE `lista` SET `visto`=1 WHERE  `id_film`=:id_film AND `id_utente`=:id_utente"  ;
$id_film=$_GET["id_film"];
$id_utente=$_GET["id_utente"];
try{
  $mioquery=$dbh->prepare($stringquery);
  $mioquery->bindValue(":id_film",$id_film);
  $mioquery->bindValue(":id_utente",$id_utente);
  $mioquery->execute();
  echo json_encode("Film segnato come visto");
}
  catch (PDOexception $e){
    echo json_encode($e->getMessage());
  }
?>