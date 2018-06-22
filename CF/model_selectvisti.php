<?php
include 'DB_conn.php';
$id_utente=$_GET["id_utente"];
$query="SELECT film.nome_film, film.anno, film.picfilm , film.id_film
FROM film INNER JOIN lista ON film.id_film=lista.id_film INNER JOIN utente ON lista.id_utente=utente.id_utente 
WHERE utente.id_utente=:id_utente AND lista.visto=true;";
$mioarray=array();
try{
    $ex_query=$dbh->prepare($query); // prepari la query
    $ex_query->bindValue(":id_utente", $id_utente);
    if($ex_query->execute()){       //esegui implicitamente la query
      while($row=$ex_query->fetch()){ //mentre ci siano righe da leggere in ex_query...
        $mioarray[]=$row;
      }
      echo json_encode($mioarray);  //risultato del foglio.php
    }
}

catch(PDOException $ex)
{
    echo "Error : " . $ex;
}

?>
