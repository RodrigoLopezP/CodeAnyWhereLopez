 <?php
include 'DB_conn.php';
session_start();
try {
    if (isset($_SESSION['array_utente'])) {
        session_destroy();
        json_encode(true);
    } else {
        json_encode(false);
    }
}
catch (PDOException $e) {
    json_encode(false);
}
?> 