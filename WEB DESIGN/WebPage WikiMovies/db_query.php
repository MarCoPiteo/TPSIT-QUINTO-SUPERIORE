<?php
function get_movies() {  //FUNZIONA
    $movies = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    } /*else {
        echo "ciao";
    }*/


    $query = 'SELECT * FROM movie';
    $result = $mysqli -> query($query);

    while ($row = $result -> fetch_assoc()) {
        $movies[] = $row;
    }
    echo json_encode($movies);
    //mysqli_free_result($result);  SERVE?


    $mysqli -> close();

    return $movies;
}


function get_actors() {  //FUNZIONA
    $actors = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    } /*else {
        echo "ciao";
    }*/


    $query = 'SELECT * FROM actor';
    $result = $mysqli -> query($query);

    while ($row = $result -> fetch_assoc()) {
        $actors[] = $row;
    }
    echo json_encode($actors);
    //mysqli_free_result($result);  SERVE?


    $mysqli -> close();

    return $actors;
}


function get_directors() {  //FUNZIONA
    $directors = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    } /*else {
        echo "ciao";
    }*/


    $query = 'SELECT * FROM director';
    $result = $mysqli -> query($query);

    while ($row = $result -> fetch_assoc()) {
        $directors[] = $row;
    }
    echo json_encode($directors);
    //mysqli_free_result($result);  SERVE?


    $mysqli -> close();

    return $directors;
}


function get_genres() {  //FUNZIONA
    $genres = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    } /*else {
        echo "ciao";
    }*/


    $query = 'SELECT * FROM genre';
    $result = $mysqli -> query($query);

    while ($row = $result -> fetch_assoc()) {
        $genres[] = $row;
    }
    echo json_encode($genres);
    //mysqli_free_result($result);  SERVE?


    $mysqli -> close();

    return $genres;
}


// fetch_assoc() restituisce un array associativo | chiave - valore
// fecth_array() restituisce un array di array | 0 - n, gli indici dipendono dalla query


/*
echo "<script>alert('ciaoo');</script>";
$movies = array();

while ($row = $result->fetch_assoc()) {
    echo $row['title'];
    $movies[] = $row;
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
}
*/
?>