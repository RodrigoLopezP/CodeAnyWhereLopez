<?php
include 'DB_conn.php';
$id=$_GET["id_regista"];

$query="SELECT regista.*
FROM  regista 
WHERE id_regista=:id";
$mioarray;
try{
    $ex_query=$dbh->prepare($query); // prepari la query
    $ex_query->bindValue(":id", $id);
    if($ex_query->execute()){       //esegui implicitamente la query
      while($row=$ex_query->fetch()){ //mentre ci siano righe da leggere in ex_query...
        $mioarray=$row;
      }
      echo json_encode($mioarray);  //risultato del foglio.php
    }
}

catch(PDOException $ex)
{
    echo "Error : " . $ex;
}

?>
