<?php

namespace Nanok\StandForm\Controllers;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

abstract class ControllerInterface {

        abstract public function index(Request $request);

        abstract public function store(Request $request);

        abstract public function update(Request $request);

        abstract public function destroy(Request $request);

    protected function addHeaders($response)
    {
        $response->setHeader("Access-Control-Allow-Origin", "*");
        $response->setHeader("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE");
        $response->setHeader("Content-Type: application/json", "charset=UTF-8");
        $response->setHeader("Access-Control-Max-Age", "3600");
        $response->setHeader("Access-Control-Allow-Headers", "Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        return $response;
    }

    protected function respond(bool $status, string $message, mixed $data) {
        return
        $this->addHeaders(new Response(["status" => $status, "message" => $message, "data" => $data], new ToJSON()));
    }
    }

?>