<?php
header('Access-Control-Allow-Origin: *');

//function get_movie($user_a)

/*
$a = [1, 0, 5, 0];
$b = [5, 0, 1, 1];
$dist = cosine_similarity($a, $b);
*/
function cosine_similarity($a, $b) {
    $dist = 0;

    $modulo_a = 0;
    $modulo_b = 0;
    $denom = 0;
    
    for ($i = 0; $i < $a[$i]; $i++) {
        $modulo_a = $modulo_a + pow($a[$i], 2);
        $modulo_b = $modulo_b + pow($b[$i], 2);
    }
    $modulo_a = sqrt($modulo_a);
    $modulo_b = sqrt($modulo_b);

    $denom = $modulo_a * $modulo_b;

    if ($denom == 0) {
        return null;
    } else {
        for ($i = 0; $i < $a[$i]; $i++) {
            $prodotto = $a[$i] * $b[$i];
    
            $numeratore = $numeratore + $prodotto;
        }
    
        $dist = $numeratore / $denom;
        echo $dist;
    
        return $dist;
    }
}

function build_matrix() {
    $mysqli = new mysqli("mysql","root","root","db_film");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

    /*GET MOVIES*/
    $moviesQuery = 'SELECT * FROM movie';

    $moviesResult = $mysqli -> query($moviesQuery);

    while ($moviesRow = $moviesResult -> fetch_assoc()) {
        $movies[] = $moviesRow;
    }
    //return $movies;


    /*GET USERS*/
    $usersQuery = 'SELECT * FROM users';

    $usersResult = $mysqli -> query($usersQuery);

    while ($usersRow = $usersResult -> fetch_assoc()) {
        $users[] = $usersRow;
    }
    //return $users;


    /*GET WATCH FILMS*/
    $watchFilmsQuery = 'SELECT * FROM movie_user';

    $watchFilmsResult = $mysqli -> query($watchFilmsQuery);

    while ($watchFilmsRow = $watchFilmsResult -> fetch_assoc()) {
        $watchFilms[] = $watchFilmsRow;
    }
    //return $watchFilms;

    $mysqli -> close();


    $movieIds = array_column($movies, 'id');
    $userIds = array_column($users, 'id');

    $movieIndex = array_flip($movieIds);
    $userIndex = array_flip($userIds);

    $matrix = array_fill(0, count($userIds), array_fill(0, count($movieIds), 0));

    foreach ($watchFilms as $watch) {
        $userId = $watch['user_id'];
        $movieId = $watch['movie_id'];
        $rating = isset($watch['rating']) ? $watch['rating'] : 0; // Se non esiste un rating, puoi impostare un valore predefinito

        $matrix[$userIndex[$userId]][$movieIndex[$movieId]] = $rating;
    }

    return $matrix;

    /*$query = "SELECT * FROM users";
    $users = $mysqli -> query($query);

    $query = "SELECT * FROM movie";
    $movies = $mysqli -> query($query);

    $matrix = array();

    foreach ($users as $user) {
        $user_id = $user['id'];
        $matrix[$user_id] = array();
        foreach ($movies as $movie) {
            $movie_id = $movie['id'];

            $query = "SELECT rating FROM movie_user WHERE user_id = $user_id AND movie_id = $movie_id";
            $query_result = $mysqli -> query($query);

            if ($query_result->num_rows > 0) {
                $rating = $query_result->fetch_assoc()['rating'];
            } else {
                $rating = null;
            }

            $matrix[$user_id][$movie_id] = $rating;
        }
    }

    return $matrix;*/
}




function most_similar_user() {

}

function recommend_movies($user_id) {
    $matrix = build_matrix();

    return $matrix;
}

?>