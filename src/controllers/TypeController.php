<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Type;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class TypeController implements ControllerInterface
    {
        
        public function index(Request $request)
        {
            $type = new Type();
            return new Response(["status" => true, "message" => "", "data" => $type->all()], new ToJSON());
        }

        public function store(Request $request)
        {
            $type = new Type(["id" => -1, "label" => $request->body["label"]]);
            $type->save();
            return new Response(["status" => true, "message" => "", "data" => $type], new ToJSON());
        }

        public function update(Request $request)
        {
            
        }

        public function destroy(Request $request)
        {
            
        }
    }
    

?>