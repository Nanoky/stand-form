<?php

namespace Nanok\StandForm\Models;

use Goa\Middleware\Database\Model;
use Goa\Middleware\Database\ModelInterface;

class Stand extends Model implements ModelInterface
    {
        public int $id;
        public int $type_id;
        public String $label;

        public function __construct($data = ["id" => -1, "type_id" => -1, "label" => ""])
        {
            parent::__construct("stand");

            $this->id = $data["id"];
            $this->type_id = $data["type_id"];
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
            return $this->getAll(Stand::class);
        }

        public function findById(array $id)
        {
            return $this->getById(Stand::class, $id);
        }

    }

    
?>