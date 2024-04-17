<?php
    

    $query = 'SELECT * FROM movie WHERE title LIKE "%$user_input%"';

    $result = $mysqli -> query($query);

    while ($row = $result -> fetch_assoc()) {
        $movies[] = $row;
    }

    echo json_encode($movies);

?>