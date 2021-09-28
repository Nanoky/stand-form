<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Field;
use Nanok\StandForm\Models\Stand;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class StandController extends ControllerInterface
    {
        
        public function index(Request $request)
        {
            $stand = new Stand();
            return $this->respond(true, "", $stand->all());
        }

        public function store(Request $request)
        {
            $stand = new Stand(["id" => -1, "label" => $request->body["label"], "type_id" => $request->body["type_id"]]);
            $stand->save();
            return $this->respond(true, "", $stand);
        }

        public function update(Request $request)
        {
            
        }

        public function destroy(Request $request)
        {
            
        }

        public function search(Request $request) 
        {
            $stand = new Stand();
            $stands = $stand->findById($request->query);

            return $this->respond(true, "", $stands);
        }
    }
