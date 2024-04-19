<?php
function get_movies($user_input, $filter) {  //FUNZIONA
    $movies = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    if ($user_input !== NULL) {
        $moviesQuery = 'SELECT * FROM movie WHERE '. $filter .' LIKE "%'.$user_input.'%"';

        /*if ($filter === 'title') {  
            $moviesQuery = 'SELECT * FROM movie WHERE title LIKE "%'.$user_input.'%"';
        } else if ($filter === 'duration') {   VA FATTO CON UN INTERVALLO DI TEMPO
            $moviesQuery = 'SELECT * FROM movie WHERE duration LIKE "%'.$user_input.'%"';
        } else if ($filter === 'released_year') {
            $moviesQuery = 'SELECT * FROM movie WHERE released_year LIKE "%'.$user_input.'%"';
        }*/
        //IL FILTRO SUL POSTER È INUTILE FARLO
    } else if ($user_input === NULL) {
        $moviesQuery = 'SELECT * FROM movie';
    }

    $moviesResult = $mysqli -> query($moviesQuery);

    while ($moviesRow = $moviesResult -> fetch_assoc()) {
        $movies[] = $moviesRow;

        $last_movie = $movies[count($movies) - 1];
        $movieID = $last_movie['id'];


        //ACTORS
        $actorsQuery = 'SELECT actor.* FROM movie_actor 
        INNER JOIN actor ON actor.id = movie_actor.actor_id 
        WHERE movie_actor.movie_id = '.$movieID;

        $actorsResult = $mysqli -> query($actorsQuery);
        if (!$actorsResult) {
            die("Error retrieving actors for movie $movieID: " . $mysqli -> connect_error);
        } 

        while ($actorsRow = $actorsResult -> fetch_assoc()) {
            $movies[count($movies) - 1]['actors'][] = $actorsRow;
        }


        //DIRECTORS
        $directorsQuery = 'SELECT director.* FROM movie_director 
        INNER JOIN director ON director.id = movie_director.director_id 
        WHERE movie_director.movie_id = '.$movieID;

        $directorsResult = $mysqli -> query($directorsQuery);
        if (!$directorsResult) {
            die("Error retrieving directors for movie $movieID: " . $mysqli -> connect_error);
        }

        while ($directorsRow = $directorsResult -> fetch_assoc()) {
            $movies[count($movies) - 1]['directors'][] = $directorsRow;
        }


        //GENRES
        $genresQuery = 'SELECT genre.* FROM movie_genre 
        INNER JOIN genre ON genre.id = movie_genre.genre_id 
        WHERE movie_genre.movie_id = '.$movieID;

        $genresResult = $mysqli -> query($genresQuery);
        if (!$genresResult) {
            die("Error retrieving genres for movie $movieID: " . $mysqli -> connect_error);
        }

        while ($genresRow = $genresResult -> fetch_assoc()) {
            $movies[count($movies) - 1]['genres'][] = $genresRow;
        }
    }


    $mysqli -> close();

    return $movies;
}


function get_actors($user_input, $filter) {  //FUNZIONA
    $actors = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    if ($user_input !== NULL) {
        $query = 'SELECT * FROM actor WHERE '. $filter .' LIKE "%'.$user_input.'%"';

        /*if ($filter === 'last_name') {
            $query = 'SELECT * FROM actor WHERE last_name LIKE "%'.$user_input.'%"';
        } else if ($filter === 'name') {  
            $query = 'SELECT * FROM actor WHERE name LIKE "%'.$user_input.'%"';
        }*/
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


function get_directors($user_input, $filter) {  //FUNZIONA
    $directors = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    
    if ($user_input !== NULL) {
        $query = 'SELECT * FROM director WHERE '. $filter .' LIKE "%'.$user_input.'%"';

        /*if ($filter === 'last_name') {
            $query = 'SELECT * FROM director WHERE last_name LIKE "%'.$user_input.'%"';
        } else if ($filter === 'name') {  
            $query = 'SELECT * FROM director WHERE name LIKE "%'.$user_input.'%"';
        }*/
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


function get_genres($user_input, $filter) {  //FUNZIONA
    $genres = array();

    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    if ($user_input !== NULL) {
        $query = 'SELECT * FROM genre WHERE '. $filter .' LIKE "%'.$user_input.'%"';

        //NON SERVE IL FILTRO SULLO SLUG
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