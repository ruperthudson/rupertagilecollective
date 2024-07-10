<?php
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);
$firstname = $data["firstname"];
$secondname = $data["secondname"];
header('Content-Type: application/json; charset=utf-8');
echo json_encode($firstname . " " . $secondname);
?>