<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Title;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class TitleController implements ControllerInterface
    {
        
        public function index(Request $request)
        {
            $title = new Title();
            return new Response(["status" => true, "message" => "", "data" => $title->all()], new ToJSON());
        }

        public function store(Request $request)
        {
            $title = new Title(["id" => -1, "label" => $request->body["label"]]);
            $title->save();
            return new Response(["status" => true, "message" => "", "data" => $title], new ToJSON());
        }

        public function update(Request $request)
        {
            
        }

        public function destroy(Request $request)
        {
            
        }
    }
    

?>