<?php
//function get_movie($user_a)

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

function build_matrix() {
    
}




function most_similar_user() {

}

function recommend_movies() {
}

?>