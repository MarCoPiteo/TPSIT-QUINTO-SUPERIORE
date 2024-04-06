<?php
    require_once("db_query.php");

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($_SERVER['PATH_INFO'] == "movies") {
            //localhost:8000/api.php/movies
            //qui estraggo i file

            $movies = get_movies($_GET[$title]);

            http_response_code(200);
            header("Content-Type: application/json");
            echo json_encode([
                "status" => 200,
                "message" => "OK",
                "payload" => $movies
            ]);
        } else if ($_SERVER['PATH_INFO'] == "actors") {
            //localhost:8000/api.php/actors
            //qui estraggo i file

            $actors = get_actors($_GET[$name]);
            http_response_code(200);
            header("Content-Type: application/json");
            echo json_encode([
                "status" => 200,
                "message" => "OK",
                "payload" => $actors
            ]);
        } else if ($_SERVER['PATH_INFO'] == "directors") {
            //localhost:8000/api.php/directors
            //qui estraggo i file

            $directors = get_directors($_GET[$name]);

            http_response_code(200);
            header("Content-Type: application/json");
            echo json_encode([
                "status" => 200,
                "message" => "OK",
                "payload" => $directors
            ]);
        } else if ($_SERVER['PATH_INFO'] == "genre") {
            //localhost:8000/api.php/genre
            //qui estraggo i file

            $genres = get_genres($_GET[$name]);

            http_response_code(200);
            header("Content-Type: application/json");
            echo json_encode([
                "status" => 200,
                "message" => "OK",
                "payload" => $genres
            ]);
        }  
    } else {
        http_response_code(405);
        header("Content-Type: application/json");
        echo json_encode([
            "status" => 405,
            "message" => "Method not allowed",
            "payload" => []
        ]);
    }

    exit;

    //localhost:8000/api.php/movies
    //localhost:8000/api.php/actors
    //localhost:8000/api.php/directors
    //localhost:8000/api.php/genres
