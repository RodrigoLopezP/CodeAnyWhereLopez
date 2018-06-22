<?php
include 'DB_conn.php';
$genere=$_GET["genere"];
$query="SELECT film.*, regista.nome,regista.cognome
FROM film  INNER JOIN regista ON regista.id_regista=film.id_regista 
WHERE film.genere=:genere
ORDER BY film.genere";
$mioarray=array();
try{
    $ex_query=$dbh->prepare($query); // prepari la query
    $ex_query->bindValue(":genere", $genere);
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
