<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Type;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class TypeController extends ControllerInterface
    {
        
        public function index(Request $request)
        {
            $type = new Type();
            return $this->respond(true, "", $type->all());
        }

        public function store(Request $request)
        {
            $type = new Type(["id" => -1, "label" => $request->body["label"]]);
            $type->save();
            return $this->respond(true, "", $type);
        }

        public function update(Request $request)
        {
            
        }

        public function destroy(Request $request)
        {
            
        }
    }
    

?>