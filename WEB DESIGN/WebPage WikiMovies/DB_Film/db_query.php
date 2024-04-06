<?php
    $db = "db_film";
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $movies = array();
    
        function get_movies()
        {
            global $conn;
            global $db;

            mysqli_select_db($conn, $db);

            $query = 'select * from movies';
            $result = $conn->query($query);


            while ($row = $result->fetch_assoc()) {
                echo $row['title'];
                $movies[] = $row;
            }
            return $movies;


        }
        $conn->close();
    }    



// fetch_assoc() restituisce un array associativo | chiave - valore
    // fecth_array() restituisce un array di array | 0 - n, gli indici dipendono dalla query
    
    
    /*$conn = new mysqli('localhost', 'root', '', 'film_db');

    if($conn->connect_error){
        die("Errore" .$conn->connect_error);
    } else {
        echo "<script>alert('ciaoo');</script>";
    }

    function get_movies() {
        if(isset($title)) {  // FILTRAGGIO SE L'UTENTE VUOLE UN FILM SPECIFICO
            // SELECT * WHERE ...
        } else {  // SE L'UTENTE VUOLE TUTTI I FILM
            // SELECT * FROM ... 
        }
    }

    function get_actors($name) {
        if(isset($name)) {  // FILTRAGGIO SE L'UTENTE VUOLE UN FILM SPECIFICO
            // SELECT * WHERE ...
        } else {  // SE L'UTENTE VUOLE TUTTI I FILM
            // SELECT * FROM ... 
        }
    }

    function get_directors($name) {
        if(isset($name)) {  // FILTRAGGIO SE L'UTENTE VUOLE UN FILM SPECIFICO
            // SELECT * WHERE ...
        } else {  // SE L'UTENTE VUOLE TUTTI I FILM
            // SELECT * FROM ... 
        }
    }

    function get_genres($name) {
        if(isset($name)) {  // FILTRAGGIO SE L'UTENTE VUOLE UN FILM SPECIFICO
            // SELECT * WHERE ...
        } else {  // SE L'UTENTE VUOLE TUTTI I FILM
            // SELECT * FROM ... 
        }
    }*/