<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Field;
use Nanok\StandForm\Models\StandType;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class StandTypeController extends ControllerInterface
{

    public function index(Request $request)
    {
        $stand = new StandType();
        return $this->respond(true, "", $stand->all());
    }

    public function store(Request $request)
    {
        $stand = new StandType(["id" => -1, "label" => $request->body["label"], "price" => $request->body["price"]]);
        $stand->save();
        return $this->respond(true, "", $stand);
    }

    public function update(Request $request)
    {
        $stand = new StandType();

        $stand = $stand->findById(["id" => $request->params["id"]]);
        $stand->label = (!empty($request->body["label"])) ? $request->body["label"] : $stand->label;
        $stand->price = (!empty($request->body["price"])) ? $request->body["price"] : $stand->price;

        $stand->update();

        return $this->respond(true, "Mise a jour effectuee", $stand);
    }

    public function destroy(Request $request)
    {
    }
}
