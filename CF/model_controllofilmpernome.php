 <?php
include 'DB_conn.php';

$id_utente = $_GET["id_utente"];
$nome_film = $_GET["nome_film"];
try
	{
	$mioquery = $dbh->prepare("SELECT film.nome_film, lista.id_utente , lista.visto FROM film INNER JOIN lista ON film.id_film=lista.id_film WHERE lista.id_utente=:id_utente AND film.nome_film=:nome_film"); //query
	$mioquery->bindValue(":nome_film", $nome_film);
	$mioquery->bindValue(":id_utente", $id_utente);
	$mioquery->execute();

	// Se la query si esegue con successo...

	$cuenta = $mioquery->rowCount(); //conta le righe che vengono come risultato della query
	$row = $mioquery->fetch();
	if ($cuenta == 1)
		{
		echo json_encode(false);
		}
	  else
		{
		echo json_encode(true);
		}
	}

catch(PDOexception $e)
	{
	echo json_encode("Errore nella esecuzione della query" . $e);
	}

?>

