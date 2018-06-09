<?php
include 'conn.php';
$var=$_POST["mostra"];
$mioarray=array();
switch($var){
  case "mostraF":
    $query"SELECT * FROM FILM;";
    break;
  case "mostraC":
    $query="SELECT * FROM CINEMA;";
    break;
}
  try{
     $querymostra=$dbh->prepare($query);
    if($querymostra->execute()){
      while($row=$querymostra->fetch()){
        $mioarray[]=$row;
      }
      echo json_encode($mioarray);
    }
    }
  
catch(PDOException $ex)
{
    echo "Error : " . $ex;
}


?>
