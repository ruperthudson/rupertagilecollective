<?php

declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Exception\JsonException;

function processRequest(Request $req): Response {
    try {
        $data = $req -> toArray();
    } catch(JsonException $e) {
        return new Response(
            "Bad request: request is malformed.",
            Response::HTTP_BAD_REQUEST,
            ['content-type' => 'text/plain'],
        );
    }

    $firstname = $data["firstname"];
    
    $secondname = $data["secondname"];
    
    if (strlen($firstname) == 0 or strlen($secondname) == 0) {
        return new Response(
            "Bad request: required form inputs should not be empty.",
            Response::HTTP_BAD_REQUEST,
            ['content-type' => 'text/plain'],
        );
    }
    
    return new Response(
        json_encode($firstname . " " . $secondname),
        Response::HTTP_OK,
        ['content-type' => 'application/json'],
    );
}

// $req = new Request([], [], [], [], [], [], '{"firstname":"", "secondname":"bar"}');

$req = Request::createFromGlobals();

$resp = processRequest($req);

$resp -> send();

?>