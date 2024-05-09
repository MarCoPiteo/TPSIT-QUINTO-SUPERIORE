<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i valori inviati dal form
    $departure = $_POST['departure'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $passenger = $_POST['passenger'];

    // Costruisci la query SQL per cercare i viaggi corrispondenti
    $sql = "SELECT * FROM viaggi WHERE partenza = '$departure' AND destinazione = '$destination' AND data_viaggio = '$date' AND nPasseggeri >= '$passenger'";

    // Esegui la query
    $result = $conn->query($sql);

    // Verifica se sono stati trovati viaggi
    if ($result->num_rows > 0) {
        // Visualizza i risultati
        while ($row = $result->fetch_assoc()) {
            echo "Partenza: " . $row["partenza"] . " - Destinazione: " . $row["destinazione"] . " - Data: " . $row["data_viaggio"] . " - Numero di passeggeri: " . $row["nPasseggeri"] . "<br>";
        }
    } else {
        echo "Nessun viaggio trovato.";
    }
}
?>
