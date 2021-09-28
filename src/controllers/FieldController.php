<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Field;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class FieldController extends ControllerInterface
    {
        
        public function index(Request $request)
        {
            $field = new Field();
            return $this->respond(true, "", $field->all());
        }

        public function store(Request $request)
        {
            $field = new Field(["id" => -1, "label" => $request->body["label"]]);
            $field->save();
            return $this->respond(true, "", $field);
        }

        public function update(Request $request)
        {
            
        }

        public function destroy(Request $request)
        {
            
        }
    }
    

?>