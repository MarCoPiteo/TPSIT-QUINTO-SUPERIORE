<?php
    require_once("db_query.php");

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($_SERVER['PATH_INFO'] == '/movies') {
            //localhost:8000/api.php/movies
            //qui estraggo i file

            $movies = get_movies();

            http_response_code(200);
            header("Content-Type: application/json");
            echo json_encode([
                "status" => 200,
                "message" => "OK",
                "payload" => $movies
            ]);
        } else if ($_SERVER['PATH_INFO'] == '/actors') {
            //localhost:8000/api.php/actors
            //qui estraggo i file

            $actors = get_actors();
            
            http_response_code(200);
            header("Content-Type: application/json");
            echo json_encode([
                "status" => 200,
                "message" => "OK",
                "payload" => $actors
            ]);
        } else if ($_SERVER['PATH_INFO'] == '/directors') {
            //localhost:8000/api.php/directors
            //qui estraggo i file

            $directors = get_directors();

            http_response_code(200);
            header("Content-Type: application/json");
            echo json_encode([
                "status" => 200,
                "message" => "OK",
                "payload" => $directors
            ]);
        } else if ($_SERVER['PATH_INFO'] == '/genres') {
            //localhost:8000/api.php/genres
            //qui estraggo i file

            $genres = get_genres();

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
?>