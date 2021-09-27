<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Field;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class FieldController implements ControllerInterface
    {
        
        public function index(Request $request)
        {
            $field = new Field();
            return new Response(["status" => true, "message" => "", "data" => $field->all()], new ToJSON());
        }

        public function store(Request $request)
        {
            $field = new Field(["id" => -1, "label" => $request->body["label"]]);
            $field->save();
            return new Response(["status" => true, "message" => "", "data" => $field], new ToJSON());
        }

        public function update(Request $request)
        {
            
        }

        public function destroy(Request $request)
        {
            
        }
    }
    

?>