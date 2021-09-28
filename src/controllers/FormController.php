<?php

namespace Nanok\StandForm\Controllers;

use Nanok\StandForm\Models\Exposant;
use Nanok\StandForm\Models\ExposantField;
use Nanok\StandForm\Models\ExposantStand;
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
            $data = $request->body;
            $exposant = new Exposant(["id" => -1, "type_id" => $data["type_id"], "name" => $data["name"], "firstname" => $data["firstname"], "address" => $data["address"], "city" => $data["city"], "country" => $data["country"], "phone" => $data["phone"], "celphone" => $data["celphone"], "email" => $data["email"], "url" => $data["url"]]);
            $exposant->save();

            $fields = $data["field_id"];
            foreach ($fields as $key => $value) {
                $field_exposant = new ExposantField(["exposant_id" => $exposant->id, "field_id" => $value]);
                $field_exposant->save();
            }

            $title = $data["title_id"];
            foreach ($title as $key => $value) {
                $title_exposant = new ExposantTitle(["id" => $exposant->id, "title_id" => $value]);
                $title_exposant->save();
            }

            $stands = $data["stand_id"];
            foreach ($stands as $key => $value) {
                $exposant_stand = new ExposantStand(["id_exposant" => $exposant->id, "id_stand" => $value->id]);
                $exposant_stand->save();
            }

            $payment = new Payment(["id" => -1, "exposant_id" => $exposant->id, "payment_mode_id" => $data["payment_mode_id"], "montant" => $data["montant"], "date" => $data["date"]]);
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