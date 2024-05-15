<?php
session_start();

header('Content-Type: application/json');

$response = array(
    "loggedIn" => false
);

if (isset($_SESSION['user'])) {
    $response["loggedIn"] = true;
    $response["user"] = array(
        "profileImageUrl" => $_SESSION['user']['profileImageUrl']
    );
}

error_log("Auth status response: " . json_encode($response));
echo json_encode($response);
?>