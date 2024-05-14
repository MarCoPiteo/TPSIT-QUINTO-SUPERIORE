<?php
//function get_movie($user_a)

/*
$a = [1, 0, 5, 0];
$b = [5, 0, 1, 1];
$dist = cosine_similarity($a, $b);
*/
function cosine_similarity($a, $b) {
    $dist = 0;
    $somma_a = 0;
    $somma_b = 0;
    $sommatore = 0;
    
    for ($i = 0; $i < $a[$i]; $i++) {
        $pow_ind = pow($a[$i], 2);
        $pow_ind = pow($b[$i], 2);

        $somma_b = $somma_b + $pow_ind;
        $somma_a = $somma_a + $pow_ind;
    }
    $modulo_a = sqrt($somma_a);
    $modulo_b = sqrt($somma_b);

    $denom = $modulo_a * $modulo_b;


    for ($i = 0; $i < $a[$i]; $i++) {
        $prodotto = $a[$i] * $b[$i];

        $sommatore = $sommatore + $prodotto;
    }

    $dist = $sommatore / $denom;

    echo $dist;

    return $dist;
}

/*function build_matrix() {
    $userId = 1; // ID dell'utente di cui vogliamo costruire la matrice di rating

// Effettua una richiesta GET per ottenere i film valutati dall'utente
$userData = file_get_contents("http://localhost:9000/api/api.php/user?id=1");

// Decodifica i dati JSON
$userRatings = json_decode($userData, true);

// Inizializza la matrice di rating degli utenti
$matrix = [];

// Costruisci la matrice di rating degli utenti
foreach ($userRatings['payload'] as $movie) {
    $movieId = $movie['movie_id'];

    // Aggiungi il film alla matrice
    $matrix[$movieId] = 1; // Imposta il valore a 1 poiché il film è stato visto dall'utente
}

// Restituisci la matrice di rating degli utenti
return $matrix;
}

// Chiamata alla funzione per costruire la matrice di rating degli utenti
$userMatrix = build_matrix();

// Visualizza la matrice di rating degli utenti
echo "<pre>";
print_r($userMatrix);
echo "</pre>";
*/



function most_similar_user() {

}

function recommend_movies() {
}

?>