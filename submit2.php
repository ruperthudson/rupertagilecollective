<?php

declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

function processRequest(Request $req): Response {
    $data = $req -> toArray();

    $firstname = $data["firstname"];
    
    $secondname = $data["secondname"];
    
    if (strlen($firstname) == 0) {
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