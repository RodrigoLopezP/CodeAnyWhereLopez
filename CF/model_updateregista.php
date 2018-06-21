<?php
include 'DB_conn.php';

$stringquery = "UPDATE `regista` SET `nome`=:nome,`cognome`=:cognome,`paese`=:paese,`data_nascita`=:datanascita,`img_regista`=:img,`link_wikipedia`=:link WHERE id_regista=:id";
$id = $_GET["id"];
$nome = $_GET["nome"];
$cognome = $_GET["cognome"];
$paese = $_GET["paese"];
$datanascita=$_GET["datanascita"];
$link = $_GET["link"];
$img = $_GET["img"];

try
	{
	$mioquery = $dbh->prepare($stringquery);
	$mioquery->bindValue(":id", $id);
	$mioquery->bindValue(":nome", $nome);
	$mioquery->bindValue(":cognome", $cognome);
	$mioquery->bindValue(":paese", $paese);
	$mioquery->bindValue(":link", $link);
	$mioquery->bindValue(":img", $img);
	$mioquery->bindValue(":datanascita", $datanascita);
	$mioquery->execute();
	echo json_encode("Modifica regista eseguita");
	}

catch(PDOexception $e)
	{
	echo json_encode($e->getMessage());
	}

?>

