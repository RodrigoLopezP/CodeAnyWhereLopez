 <?php
include 'DB_conn.php';
session_start();
if (isset($_SESSION['array_utente'])) {
    echo json_encode($_SESSION['array_utente']);;
}
else {
    $email = $_GET["login_email"]; //prendo la email dal getJSON
    $pass  = $_GET["login_password"]; //prendo la password dal getJSON 
    //$email="matteosalvini@gmail.com";
    //$pass="acasaloro";
    //Converto la password in MD5
    $pass  = MD5($pass);
    try {
        $mioquery = $dbh->prepare("SELECT * FROM utente WHERE utente.email=:email AND utente.password=:password;"); //query
        $mioquery->bindValue(":email", $email);
        $mioquery->bindValue(":password", $pass);
        $mioquery->execute();
        //Se la query si esegue con successo...
        $cuenta = $mioquery->rowCount(); //conta le righe che vengono come risultato della query
        $row    = $mioquery->fetch();
        if ($cuenta == 1) {
            $_SESSION['array_utente']   = array();
            $_SESSION['array_utente'][] = $row['id_utente'];
            $_SESSION['array_utente'][] = $row['nickname'];
            $_SESSION['array_utente'][] = $row['nome'];
            $_SESSION['array_utente'][] = $row['cognome'];
            $_SESSION['array_utente'][] = $row['data_nascita'];
            $_SESSION['array_utente'][] = $row['email'];
            $_SESSION['array_utente'][] = $row['password'];
            echo json_encode($_SESSION['array_utente']);
            
        } else {
            session_destroy();
            echo json_encode("UtenteNonTrovato");
        }
    }
    catch (PDOexception $e) {
        session_destroy();
        echo json_encode("Error_query");
    }
}
?> 