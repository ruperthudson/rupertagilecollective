<?php

declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;

function processRequest(Request $req): Response {
    // Try parse JSON body -> $data
    try {
        $data = $req -> toArray();
    } catch(JsonException $e) {
        return new Response(
            "Bad request: request is malformed.",
            Response::HTTP_BAD_REQUEST,
            ['content-type' => 'text/plain'],
        );
    }

    // TODO: Gracefully handle invalid JSON
    $firstname = $data["firstname"]; 
    $secondname = $data["secondname"];

    // Require non-empty fields
    if (strlen($firstname) == 0 or strlen($secondname) == 0) {
        return new Response(
            "Bad request: required form inputs should not be empty.",
            Response::HTTP_BAD_REQUEST,
            ['content-type' => 'text/plain'],
        );
    }
    
    // Success
    return new JsonResponse($firstname . " " . $secondname);
}

// $req = new Request([], [], [], [], [], [], '{"firstname":"foo", "secondname":"bar"}');

$req = Request::createFromGlobals();

$resp = processRequest($req);

$resp -> send();

?>