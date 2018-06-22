<?php
include 'DB_conn.php';
$nome=$_GET["nome_film"];

$query="SELECT film.*, regista.*
FROM film INNER JOIN regista ON regista.id_regista=film.id_regista
WHERE film.nome_film=:nome";
$mioarray;
try{
    $ex_query=$dbh->prepare($query); // prepari la query
    $ex_query->bindValue(":nome", $nome);
    if($ex_query->execute()){       //esegui implicitamente la query
      while($row=$ex_query->fetch()){ //mentre ci siano righe da leggere in ex_query...
        $mioarray=$row;
      }
      echo json_encode($mioarray);  //risultato del foglio.php
    }
}

catch(PDOException $ex)
{
    echo json_encode(false);
}

?>
