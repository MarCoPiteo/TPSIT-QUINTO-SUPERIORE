<?php
session_start();
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera l'ID dell'autista dalla sessione
    $id_autista = $_SESSION['id_autista'];

    // Recupera i dati del viaggio dalla richiesta POST
    $partenza = $_POST["departure_city"];
    $destinazione = $_POST["destination_city"];
    $data = $_POST["travel_date"];
    $nPasseggeri = $_POST["passengers"];
    $modello = $_POST["car_model"];
    $targa = $_POST["license_plate"];
    $colore = $_POST["car_color"];
    $anno = $_POST["car_year"];
    $nPostiTotali = $_POST["total_seats"];
    $nPostiDisponibili = $_POST["available_seats"];

    // Costruisci e esegui la query per inserire i dati del viaggio nel database
    $sql = "INSERT INTO viaggi (id_autista, partenza, destinazione, data_viaggio, nPasseggeri, modello, targa, colore, anno, nPostitotale, nPostiDisponibili)
            VALUES ('$id_autista', '$partenza', '$destinazione', '$data', '$nPasseggeri', '$modello', '$targa', '$colore', '$anno', '$nPostiTotali', '$nPostiDisponibili')";

    if ($conn->query($sql) === TRUE) {
        // Inserimento del viaggio avvenuto con successo
        echo "<script>alert('Il viaggio è stato pubblicato con successo!')</script>";
        header("Location: sign.html");
        exit;
    } else {
        // Si è verificato un errore durante l'esecuzione della query SQL
        echo "Errore durante l'inserimento del viaggio: " . $conn->error;
    }
}
?>
