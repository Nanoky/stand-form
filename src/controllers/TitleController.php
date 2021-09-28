<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Title;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class TitleController extends ControllerInterface
    {
        
        public function index(Request $request)
        {
            $title = new Title();
            return $this->respond(true, "", $title->all()); 
        }

        public function store(Request $request)
        {
            $title = new Title(["id" => -1, "label" => $request->body["label"]]);
            $title->save();
            return $this->respond(true, "", $title);
        }

        public function update(Request $request)
        {
            
        }

        public function destroy(Request $request)
        {
            
        }
    }
    

?>