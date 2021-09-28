<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Field;
use Nanok\StandForm\Models\PaymentMode;
use Nanok\StandForm\Models\Stand;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class PaymentModeController extends ControllerInterface
{

    public function index(Request $request)
    {
        $model = new PaymentMode();
        return $this->respond(true, "", $model->all());
    }

    public function store(Request $request)
    {
        $model = new PaymentMode(["id" => -1, "label" => $request->body["label"]]);
        $model->save();
        return $this->respond(true, "", $model);
    }

    public function update(Request $request)
    {
    }

    public function destroy(Request $request)
    {
    }
}
