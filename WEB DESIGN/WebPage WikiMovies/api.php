<?php
    require_once("db_query.php");

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if ($_SERVER['PATH_INFO'] == '/movies') {
            //localhost:8000/api.php/movies
            //qui estraggo i file

            if (isset($_GET['title'])) {
                $user_input = $_GET['title'];
            } else if (isset($_GET['synopsis'])) {
                $user_input = $_GET['synopsis'];
            } else if (isset($_GET['duration'])) {
                $user_input = $_GET['duration'];
            } else if (isset($_GET['released_year'])) {
                $user_input = $_GET['released_year'];
            } else {
                $user_input = NULL;
            }
            //IL FILTRO SUL POSTER È INUTILE FARLO

            $movies = get_movies($user_input);


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

            if (isset($_GET['last_name'])) {
                $user_input = $_GET['last_name'];;
            } else if (isset($_GET['name'])) {
                $user_input = $_GET['name'];
            } else {
                $user_input = NULL;
            }
            //MANCA FILTRO DATA NASCITA
            //MANCA FILTRO CON PIU CAMPI

            $actors = get_actors($user_input);

            
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

            if (isset($_GET['last_name'])) {
                $user_input = $_GET['last_name'];;
            } else if (isset($_GET['name'])) {
                $user_input = $_GET['name'];
            } else {
                $user_input = NULL;
            }
            //MANCA FILTRO DATA NASCITA
            //MANCA FILTRO CON PIU CAMPI

            $directors = get_directors($user_input);


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

            if (isset($_GET['name'])) {
                $user_input = $_GET['name'];;
            } /*else if (isset($_GET['slug'])) {    CAPIRE SE SERVE FARLO
                $user_input = $_GET['slug'];
            }*/ else {
                $user_input = NULL;
            }

            $genres = get_genres($user_input);
            

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