<?php

namespace Nanok\StandForm\Models;

use Goa\Middleware\Database\Model;
use Goa\Middleware\Database\ModelInterface;

class PaymentMode extends Model implements ModelInterface
    {
        public int $id;
        public String $label;

        public function __construct($data = ["id" => -1, "label" => ""])
        {
            parent::__construct("payment_mode");

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
            return $this->getAll(PaymentMode::class);
        }

        public function findById(array $id)
        {
            return $this->getById(PaymentMode::class, $id);
        }

    }
