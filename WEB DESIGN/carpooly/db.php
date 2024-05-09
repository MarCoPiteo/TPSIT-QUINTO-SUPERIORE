<?php

$conn = new mysqli('localhost', 'root', '', 'carpooly_db');

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Tabella 'users' creata con successo') </s;cript>";
} else {
    echo "Errore nella creazione della tabella 'users': " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS autisti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    gender ENUM('male','female','other') NOT NULL,
    N_Patente TEXT NOT NULL,
    E_Patente DATE NOT NULL,
    S_Patente DATE NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Tabella 'autisti' creata con successo') <;/script>";
} else {
    echo "Errore nella creazione della tabella 'autisti': " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS viaggi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_autista INT NOT NULL,
    partenza VARCHAR(255) NOT NULL,
    destinazione VARCHAR(255) NOT NULL,
    data_viaggio DATE NOT NULL,
    ora_partenza TIME NOT NULL,
    posti_disponibili INT NOT NULL,
    prezzo DECIMAL(10, 2) NOT NULL,
    creato_il TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_autista) REFERENCES autisti(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Tabella 'viaggi' creata con successo') </;script>";
} else {
    echo "Errore nella creazione della tabella 'viaggi': " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utente INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    commento TEXT,
    valutazione INT NOT NULL,
    creato_il TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utente) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Tabella 'feedback' creata con successo') ;</script>";
} else {
    echo "Errore nella creazione della tabella 'feedback': " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS prenotazioni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_viaggio INT NOT NULL,
    id_passeggero INT NOT NULL,
    posti_prenotati INT NOT NULL,
    creato_il TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_viaggio) REFERENCES viaggi(id),
    FOREIGN KEY (id_passeggero) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Tabella 'prenotazioni' creata con success;o') </script>";
} else {
    echo "Errore nella creazione della tabella 'prenotazioni': " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS automobile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_autista INT NOT NULL,
    marca VARCHAR(50) NOT NULL,
    modello VARCHAR(50) NOT NULL,
    anno INT NOT NULL,
    colore VARCHAR(50) NOT NULL,
    targa VARCHAR(20) NOT NULL,
    posti_disponibili INT NOT NULL,
    FOREIGN KEY (id_autista) REFERENCES autisti(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Tabella 'automobile' creata con successo';) </script>";
} else {
    echo "Errore nella creazione della tabella 'automobile': " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS assegna (
    id_viaggio INT NOT NULL,
    id_autista INT NOT NULL,
    PRIMARY KEY (id_viaggio, id_autista),
    FOREIGN KEY (id_viaggio) REFERENCES viaggi(id),
    FOREIGN KEY (id_autista) REFERENCES autisti(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Tabella 'assegna' creata con successo') <;/script>";
} else {
    echo "Errore nella creazione della tabella 'assegna': " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS riceve (
    id_viaggio INT NOT NULL,
    id_passeggero INT NOT NULL,
    PRIMARY KEY (id_viaggio, id_passeggero),
    FOREIGN KEY (id_viaggio) REFERENCES viaggi(id),
    FOREIGN KEY (id_passeggero) REFERENCES users(id)
)";


if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Tabella 'riceve' creata con successo') </;script>";
} else {
    echo "Errore nella creazione della tabella 'riceve': " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS effettua (
    id_passeggero INT NOT NULL,
    id_prenotazione INT NOT NULL,
    PRIMARY KEY (id_passeggero, id_prenotazione),
    FOREIGN KEY (id_passeggero) REFERENCES users(id),
    FOREIGN KEY (id_prenotazione) REFERENCES prenotazioni(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Tabella 'effettua' creata con successo') ;</script>";
} else {
    echo "Errore nella creazione della tabella 'effettua': " . $conn->error . "<br>";
}

?>
