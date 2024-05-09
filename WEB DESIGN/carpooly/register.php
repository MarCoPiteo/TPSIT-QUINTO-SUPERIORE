<?php
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $email =  $_POST['email'];
    $emailCheckQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($emailCheckQuery);

    if (!$result) {
        echo "Errore nella query: " . $conn->error;
        exit;
    }

    if ($result->num_rows > 0) {
        echo "<script>alert('L\'email inserita è già associata ad un account');</script>";
        exit;
    } else {

        $sql = "INSERT INTO users (email, password, name, surname, birthdate, gender) VALUES ('$email', '$password', '$name', '$surname', '$birthdate', '$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registrazione avvenuta con successo');</script>";
            echo "<script> window.location.href = 'sign.html'; </script>";
            exit;
        } else {
            echo "Errore nella registrazione dell'utente: " . $conn->error;
        }
    }
}
?>
