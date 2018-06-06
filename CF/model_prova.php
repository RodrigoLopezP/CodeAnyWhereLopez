<?php
include 'DB_conn.php';
$query="SELECT * FROM utente;";
$mioarray=array();
try{
    $ex_query=$dbh->prepare($query); // prepari la query
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
