<?php
function get_movies($user_input) {  //FUNZIONA
    $movies = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    if ($user_input !== NULL) {
        if (isset($_GET['title'])) {
            $query = 'SELECT * FROM movie WHERE title LIKE "%'.$user_input.'%"';
        } /*else if (isset($_GET['synopsis'])) {    BISOGNA CAPIRE COME GESTIRE LA RICERCA PER SINOSSI
            $query = 'SELECT * FROM movie WHERE synopsis LIKE "%'.$user_input.'%"';
        }*/ /*else if (isset($_GET['duration'])) {   VA FATTO CON UN INTERVALLO DI TEMPO
            $query = 'SELECT * FROM movie WHERE duration LIKE "%'.$user_input.'%"';
        }*/ else if (isset($_GET['released_year'])) {
            $query = 'SELECT * FROM movie WHERE released_year LIKE "%'.$user_input.'%"';
        }
        //IL FILTRO SUL POSTER È INUTILE FARLO
    } else if ($user_input === NULL) {
        $query = 'SELECT * FROM movie';
    }

    $result = $mysqli -> query($query);

    while ($row = $result -> fetch_assoc()) {
        $movies[] = $row;
    }


    $mysqli -> close();

    return $movies;
}


function get_actors($user_input) {  //FUNZIONA
    $actors = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    if ($user_input !== NULL) {
        if (isset($_GET['last_name'])) {
            $query = 'SELECT * FROM actor WHERE last_name LIKE "%'.$user_input.'%"';
        } else if (isset($_GET['name'])) {  
            $query = 'SELECT * FROM actor WHERE name LIKE "%'.$user_input.'%"';
        }
        //MANCA FILTRO DATA NASCITA
        //MANCA FILTRO CON PIU CAMPI
    } else if ($user_input === NULL) {
        $query = 'SELECT * FROM actor';
    }

    $result = $mysqli -> query($query);

    while ($row = $result -> fetch_assoc()) {
        $actors[] = $row;
    }


    $mysqli -> close();

    return $actors;
}


function get_directors($user_input) {  //FUNZIONA
    $directors = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    
    if ($user_input !== NULL) {
        if (isset($_GET['last_name'])) {
            $query = 'SELECT * FROM director WHERE last_name LIKE "%'.$user_input.'%"';
        } else if (isset($_GET['name'])) {  
            $query = 'SELECT * FROM director WHERE name LIKE "%'.$user_input.'%"';
        }
        //MANCA FILTRO DATA NASCITA
        //MANCA FILTRO CON PIU CAMPI
        
    } else if ($user_input === NULL) {
        $query = 'SELECT * FROM director';
    }
    
    $result = $mysqli -> query($query);

    while ($row = $result -> fetch_assoc()) {
        $directors[] = $row;
    }


    $mysqli -> close();

    return $directors;
}


function get_genres($user_input) {  //FUNZIONA
    $genres = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    if ($user_input !== NULL) {
        if (isset($_GET['name'])) {  
            $query = 'SELECT * FROM genre WHERE name LIKE "%'.$user_input.'%"';
        } /*else if (isset($_GET['slug'])) {  
            $query = 'SELECT * FROM genre WHERE slug LIKE "%'.$user_input.'%"';
        }*/
    } else if ($user_input === NULL) {
        $query = 'SELECT * FROM genre';
    }

    $result = $mysqli -> query($query);

    while ($row = $result -> fetch_assoc()) {
        $genres[] = $row;
    }


    $mysqli -> close();

    return $genres;
}


// fetch_assoc() restituisce un array associativo | chiave - valore
// fecth_array() restituisce un array di array | 0 - n, gli indici dipendono dalla query
?>