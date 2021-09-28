<?php

namespace Nanok\StandForm\Models;

use Goa\Middleware\Database\Model;
use Goa\Middleware\Database\ModelInterface;


class ExposantStand extends Model implements ModelInterface
{
    public int $id_exposant;
    public int $id_stand;

    public function __construct($data = ["id_exposant" => -1, "id_stand" => -1])
    {
        parent::__construct("type_stand");

        $this->id_exposant = $data["id_exposant"];
        $this->id_stand = $data["id_stand"];
    }

    public function save()
    {
        $this->insertModel();
    }

    public function update()
    {
        $this->updateModel(["id_exposant", "id_stand"], true);
    }

    public function delete()
    {
        $this->deleteModel(["id_exposant", "id_stand"], true);
    }

    public function all()
    {
        return $this->getAll(ExposantStand::class);
    }

    public function findById(array $id)
    {
        return $this->getById(ExposantStand::class, $id);
    }
}
