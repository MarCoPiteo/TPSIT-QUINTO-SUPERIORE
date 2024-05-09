<?php
session_start();
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Imposta l'email nella sessione
        $_SESSION['email'] = $email;
        
        // Ottieni il nome dell'utente
        $getNameQuery = "SELECT name FROM users WHERE email='$email'";
        $resultName = $conn->query($getNameQuery);

        if ($resultName->num_rows == 1) {
            $row = $resultName->fetch_assoc();
            $userName = $row['name'];
        
            echo "Nome utente: $userName";
            // Redirect alla dashboard del passeggero con il nome utente corretto
            header("Location: dashboard-passenger.php?name=$userName");
            exit;
        } else {
            echo "<script>alert('Errore nel recupero del nome utente');</script>";
            exit;
        }
        
    } else {
        echo "<script>alert('Credenziali errate. Riprova.');</script>";
        exit;
    }
}
?>
