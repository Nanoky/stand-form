<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Exposant;
use Nanok\StandForm\Models\ExposantField;
use Nanok\StandForm\Models\ExposantTitle;
use Nanok\StandForm\Models\Payment;
use Ngbin\Framework\Entity\Request;
use Ngbin\Framework\Entity\Response;
use Ngbin\Framework\Formatter\ToJSON;

class FormController extends ControllerInterface
    {
        
        public function index(Request $request)
        {
            $exposant = new Exposant();
            return new Response((!empty($request->params["id"])) ? $exposant->findById(["id" => $request->params["id"]]) : $exposant->all, new ToJSON());
        }

        public function store(Request $request)
        {
            $exposant = new Exposant(["id" => -1, "type_id" => $request->body["type_id"], "name" => $request->body["name"], "firstname" => $request->body["firstname"], "address" => $request->body["address"], "city" => $request->body["city"], "country" => $request->body["country"], "phone" => $request->body["phone"], "celphone" => $request->body["celphone"], "email" => $request->body["email"], "url" => $request->body["url"]]);
            $exposant->save();

            $field_exposant = new ExposantField(["exposant_id" => $exposant->id, "field_id" => $request->body["field_id"]]);
            $field_exposant->save();

            $title_exposant = new ExposantTitle(["id" => $exposant->id, "title_id" => $request->body["title_id"]]);
            $title_exposant->save();

            $payment = new Payment(-1, $exposant->id);
            $payment->save();

            return $this->respond(true, "Exposant enregistrer", $exposant);
        }

        public function update(Request $request)
        {
            
        }

        public function destroy(Request $request)
        {
            
        }
    }
    

?>