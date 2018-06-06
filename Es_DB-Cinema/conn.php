<?php


$conn= 'mysql:host=127.0.0.1; dbname=DB_cinema;' ;
$user='root';
$pass='481516';
try {
    $dbh=new PDO($conn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Errore nella connessione: ' . $e->getMessage(); 
}
?>