<?php 

class Enclosure extends Database {
    private $id;
    private $name;
    private $description;
    private $created_at;

    public function getId (){
        return $this -> id;
    }

    public function getName (){
        return $this -> name;
    }

    public function getDescription (){
        return $this -> description;
    }

    public function getDate (){
        return $this -> created_at;
    }

}
