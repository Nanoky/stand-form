<?php

    namespace Nanok\StandForm\Models;

use Goa\Middleware\Database\Model;
use Goa\Middleware\Database\ModelInterface;

class Exposant extends Model implements ModelInterface
    {
        public int $id;
        public int $type_id;
        public String $name;
        public String $firstname;
        public String $address;
        public String $city;
        public String $country;
        public String $phone;
        public String $celphone;
        public String $email;
        public String $url;

        public function __construct($data = ["id" => -1, "type_id" => -1, "name" => "", "firstname" => "", "address" => "", "city" => "", "country" => "", "phone" => "", "celphone" => "", "email" => "", "url" => ""])
        {
            parent::__construct("exposant");

            $this->id = $data["id"];
            $this->type_id = $data["type_id"];
            $this->name = $data["name"];
            $this->firstname = $data["firstname"];
            $this->address = $data["address"];
            $this->city = $data["city"];
            $this->country = $data["country"];
            $this->phone = $data["phone"];
            $this->celphone = $data["celphone"];
            $this->email = $data["email"];
            $this->url = $data["url"];
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
            return $this->getAll(Exposant::class);
        }

        public function findById(array $id)
        {
            return $this->getById(Exposant::class, $id);
        }
    }

    class Title extends Model implements ModelInterface
    {

        public int $id;
        public String $label;

        public function __construct($data = ["id" => -1, "label" => ""])
        {
            parent::__construct("title");
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
            return $this->getAll(Title::class);
        }

        public function findById(array $id)
        {
            return $this->getById(Title::class, $id);
        }
    }
    
    
    class Type extends Model implements ModelInterface
    {
        public int $id;
        public String $label;

        public function __construct($data = ["id" => -1, "label" => ""])
        {
            parent::__construct("type");
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
            return $this->getAll(Type::class);
        }

        public function findById(array $id)
        {
            return $this->getById(Type::class, $id);
        }
    }

    class ExposantTitle extends Model implements ModelInterface
    {
        public int $exposant_id;
        public int $title_id;

        public function __construct($data = ["exposant_id" => -1, "title_id" => -1])
        {
            parent::__construct("exposant_title");

            $this->exposant_id = $data["exposant_id"];
            $this->title_id = $data["title_id"];
        }
        
        public function save()
        {
            $this->insertModel();
        }

        public function update()
        {
            $this->updateModel(["exposant_id", "title_id"], true);
        }

        public function delete()
        {
            $this->deleteModel(["exposant_id", "title_id"], true);
        }

        public function all()
        {
            return $this->getAll(ExposantTitle::class);
        }

        public function findById(array $id)
        {
            return $this->getById(ExposantTitle::class, $id);
        }
    }
    
    

?>