<?php

use Goa\Middleware\Database\DB;
use Ngbin\Framework\App;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;

require_once "vendor/autoload.php";
require_once "vendor/nanok/database-middleware/src/DB.php";
require_once "vendor/nanok/database-middleware/src/Model.php";
require_once "src/controllers/Controller.php";
require_once "src/models/Exposant.php";
require_once "src/models/Field.php";

$config = [
    "sgbd" => DB::SGBD_SQLITE,
    "host" => "localhost",
    "dbname" => "stand",
    "username" => "nanok",
    "password" => "123456789",
    "file" => dirname(__FILE__) . "/database/standform"
];

$app = new App();

$app->addPostRoute("/submit", \Nanok\StandForm\Controllers\FormController::class, "store");

$app->addGetRoute("/type", \Nanok\StandForm\Controllers\TypeController::class, "index");
$app->addPostRoute("/type", \Nanok\StandForm\Controllers\TypeController::class, "store");

$app->addGetRoute("/title", \Nanok\StandForm\Controllers\TitleController::class, "index");
$app->addPostRoute("/title", \Nanok\StandForm\Controllers\TitleController::class, "store");

$app->addGetRoute("/field", \Nanok\StandForm\Controllers\FieldController::class, "index");
$app->addPostRoute("/field", \Nanok\StandForm\Controllers\FieldController::class, "store");

$app->get("/", function (Request $req) {
    return new Response("Hello world");
});

$app->run(); 

?>