<?php 

class Animal extends Database {
    private $id;
    private $name;
    private $description;
    private $specie;
    private $created_at;
    private $id_enclos;


    public function getId (){
        return $this -> id;
    }

    public function getName (){
        return $this -> name;
    }

    public function getDescription (){
        return $this -> description;
    }

    public function getSpecie (){
        return $this -> specie;
    }

    public function getDate (){
        return $this -> created_at;
    }
    
    public function getIdEnclos (){
        return $this -> id_enclos;
    }


    public function addAnimal()
    {
        $stmt = $this->db->prepare('INSERT INTO `animals` (name, description, specie, id_enclos) VALUES (:name, :description, :specie, :id_enclos)');
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':decription', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':specie', $this->specie, PDO::PARAM_STR);
        $stmt->bindValue(':id_enclos', $this->specie, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}