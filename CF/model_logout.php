 <?php
include 'DB_conn.php';
session_start();
try {
    if (isset($_SESSION['array_utente'])) {
        session_destroy();
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}
catch (PDOException $e) {
    echo json_encode(false);
}
?> 