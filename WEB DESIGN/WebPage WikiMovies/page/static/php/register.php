<?php
header('Access-Control-Allow-Origin: *');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email =  $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];    


    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }


    $emailCheckQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $mysqli->query($emailCheckQuery);

    if ($result->num_rows > 0) {
        echo "<script>alert('L\'email inserita è già associata ad un account');</script>";
        exit;
    } else {
        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
        //echo $password;
        //echo "Encrypted Password". $encryptedPassword;

        $insertUserData = "INSERT INTO users (name, last_name, email, password, username, registration_date) VALUES ('$name', '$surname', '$email', '$encryptedPassword', '$username', NOW())";

        if ($mysqli->query($insertUserData) === TRUE) {
            echo "<script>alert('Registrazione avvenuta con successo');</script>";
            echo "<script> window.location.href = '../../login.html'; </script>";
            exit;
        } else {
            echo "<script>alert('Registrazione errore');</script>";
            echo "Errore nella registrazione dell'utente: " . $mysqli->connect_error;
        }
    }
}


/*if (password_verify($password, $encryptedPassword)) {
            
}*/
?>