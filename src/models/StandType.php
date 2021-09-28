<?php

namespace Nanok\StandForm\Models;

use Goa\Middleware\Database\Model;
use Goa\Middleware\Database\ModelInterface;

    
class StandType extends Model implements ModelInterface
{
    public int $id;
    public int $price;
    public String $label;

    public function __construct($data = ["id" => -1, "price" => 0, "label" => ""])
    {
        parent::__construct("type_stand");

        $this->id = $data["id"];
        $this->price = $data["price"];
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
        return $this->getAll(StandType::class);
    }

    public function findById(array $id)
    {
        return $this->getById(StandType::class, $id);
    }
}
