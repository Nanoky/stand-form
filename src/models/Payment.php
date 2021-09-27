<?php

namespace Nanok\StandForm\Models;

use Goa\Middleware\Database\Model;
use Goa\Middleware\Database\ModelInterface;

class Payment extends Model implements ModelInterface
    {
        public int $id;
        public int $exposant_id;
        public String $date;

        public function __construct($data = ["id" => -1, "exposant_id" => -1, "date" => ""])
        {
            parent::__construct("payment");

            $this->id = $data["id"];
            $this->exposant_id = $data["exposant_id"];
            $this->date = $data["date"];
        }
        
        public function save()
        {
            $this->data = date("d-m-Y");
            $this->insertModel();
            $this->id = $this->getLastId();
        }

        public function update()
        {
            $this->updateModel("id");
        }

        public function delete()
        {
            $this->deleteModel("id");
        }

        public function all()
        {
            return $this->getAll(Payment::class);
        }

        public function findById(array $id)
        {
            return $this->getById(Payment::class, $id);
        }

    }
    

?>