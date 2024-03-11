<?php
$users = [
    ['id' => 1, 'name' => 'John Doe', 'hobby' => 'Recitazione'],
    ['id' => 2, 'name' => 'Jane Doe', 'hobby' => 'Recitazione'],
    ['id' => 3, 'name' => 'Alice', 'hobby' => 'Danza'],
    ['id' => 4, 'name' => 'Bob', 'hobby' => 'Canto'],
];

http_response_code(200);
header('Content-Type: application/json');
echo json_encode([
    "status" => 200,
    "message" => "Success",
    "payload" => $users
]);

//echo json_encode($users);
exit;


?>