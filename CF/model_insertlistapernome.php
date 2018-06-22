<?php
include 'DB_conn.php';

$id_utente = $_GET["id_utente"];
$id_film = $_GET["id_film"];
try
	{
	$mioquery = $dbh->prepare("INSERT INTO `lista`(`id_utente`, `id_film`, `visto`, `voto`) VALUES (:id_utente,:id_film,0,null)");
	$mioquery->bindValue(":id_utente", $id_utente);
	$mioquery->bindValue(":id_film", $id_film);
	$mioquery->execute();
	echo json_encode("Inserimento film eseguito");
	}

catch(PDOexception $e)
	{
	echo json_encode("Errore...".$e->getMessage());
	}

?>
