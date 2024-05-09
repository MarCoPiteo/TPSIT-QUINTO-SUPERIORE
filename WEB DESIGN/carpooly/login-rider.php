<?php
session_start();
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM autisti WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Ottieni l'ID e il nome dell'autista
        $row = $result->fetch_assoc();
        $id_autista = $row['id'];
        $userName = $row['name'];
        
        // Imposta l'email e l'ID dell'autista nella sessione
        $_SESSION['email'] = $email;
        $_SESSION['id_autista'] = $id_autista;
        
        // Redirect alla dashboard dell'autista con il nome utente e l'ID corretti nell'URL
        header("Location: dashboard-autisti.php?name=$userName&id=$id_autista");
        exit;
    } else {
        echo "<script>alert('Credenziali errate. Riprova.');</script>";
        exit;
    }
}
?>
