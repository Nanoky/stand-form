<?php

namespace Nanok\StandForm\Models;

use Goa\Middleware\Database\Model;
use Goa\Middleware\Database\ModelInterface;

class Field extends Model implements ModelInterface
    {

        public int $id;
        public String $label;

        public function __construct($data = ["id" => -1, "label" => ""])
        {
            parent::__construct("field");
            
            $this->id = $data["id"];
            $this->label = $data["label"];
        }
        
        public function save()
        {
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
            return $this->getAll(Field::class);
        }

        public function findById(array $id)
        {
            return $this->getById(Field::class, $id);
        }
    }

    class ExposantField extends Model implements ModelInterface
    {

        public int $exposant_id;
        public int $field_id;

        public function __construct($data = ["exposant_id" => -1, "field_id" => -1])
        {
            parent::__construct("exposant_field");

            $this->exposant_id = $data["exposant_id"];
            $this->field_id = $data["field_id"];
        }
        
        public function save()
        {
            $this->insertModel();
        }

        public function update()
        {
            $this->updateModel(["exposant_id", "field_id"], true);
        }

        public function delete()
        {
            $this->deleteModel(["exposant_id", "field_id"], true);
        }

        public function all()
        {
            return $this->getAll(ExposantField::class);
        }

        public function findById(array $id)
        {
            return $this->getById(ExposantField::class, $id);
        }
    }
    
    

?>