<?php

namespace Models;

use \PDO as PDO;
use \Exception as Exception;

/**
 * Class Animal representing an animal in the database.
 */
class Animal extends Database
{
    private $id;
    private $name;
    private $description;
    private $specie;
    private $created_at;
    private $id_enclosure;

    /**
     * Gets the animal's ID.
     * 
     * @return int The animal's ID.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the animal's name.
     * 
     * @return string The animal's name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the animal's description.
     * 
     * @return string The animal's description.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Gets the animal's species.
     * 
     * @return string The animal's species.
     */
    public function getSpecie()
    {
        return $this->specie;
    }

    /**
     * Gets the animal's creation date.
     * 
     * @return string The animal's creation date.
     */
    public function getDate()
    {
        return $this->created_at;
    }

    /**
     * Gets the animal's enclosure ID.
     * 
     * @return int The animal's enclosure ID.
     */
    public function getIdEnclos()
    {
        return $this->id_enclosure;
    }

    /**
     * Sets the animal's ID.
     * 
     * @param int $id The animal's ID.
     * @throws Exception If the ID is invalid.
     */
    public function setId($id)
    {
        if (empty($id)) throw new Exception('The animal ID is required');
        if (!is_numeric($id)) throw new Exception('The animal ID must be an integer');
        $floatVal = floatval($id);
        $id = intval($id);
        if ($id != $floatVal) throw new Exception('The animal ID must be an integer');
        if ($id <= 0) throw new Exception('The animal ID must be greater than 0');

        $this->id = htmlspecialchars($id);
    }

    /**
     * Sets the animal's name.
     * 
     * @param string $name The animal's name.
     * @throws Exception If the name is invalid.
     */
    public function setName($name)
    {
        if (empty($name)) throw new Exception('The animal name is required');
        if (strlen($name) < 3) throw new Exception('The animal name must be at least 3 characters long');
        if (strlen($name) > 50) throw new Exception('The animal name must be at most 50 characters long');

        $this->name = htmlspecialchars($name);
    }

    /**
     * Sets the animal's description.
     * 
     * @param string $description The animal's description.
     * @throws Exception If the description is invalid.
     */
    public function setDescription($description)
    {
        if (empty($description)) throw new Exception('The animal description is required');
        if (strlen($description) < 3) throw new Exception('The animal description must be at least 3 characters long');
        if (strlen($description) > 100) throw new Exception('The animal description must be at most 200 characters long');

        $this->description = htmlspecialchars($description);
    }

    /**
     * Sets the animal's species.
     * 
     * @param string $specie The animal's species.
     */
    public function setSpecie($specie)
    {
        $this->specie = htmlspecialchars($specie);
    }

    /**
     * Sets the animal's enclosure ID.
     * 
     * @param int $id_enclosure The enclosure ID.
     * @throws Exception If the enclosure ID is invalid.
     */
    public function setEnclosureId($id_enclosure)
    {
        if (!is_numeric($id_enclosure)) throw new Exception('The enclosure ID must be an integer');
        $floatVal = floatval($id_enclosure);
        $id_enclosure = intval($id_enclosure);
        if ($id_enclosure != $floatVal) throw new Exception('The enclosure ID must be an integer');

        $this->id_enclosure = htmlspecialchars($id_enclosure);
    }

    /**
     * Adds a new animal to the database.
     * 
     * @return bool True if the addition was successful, false otherwise.
     */
    public function addAnimal()
    {
        $stmt = $this->db->prepare('INSERT INTO `animals` (name, description, specie, id_enclosure) VALUES (:name, :description, :specie, :id_enclosure)');
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':specie', $this->specie, PDO::PARAM_STR);
        $stmt->bindValue(':id_enclosure', $this->id_enclosure, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Retrieves all animals from the database.
     * 
     * @return array An array containing all animals.
     */
    public function get()
    {
        $stmt = $this->db->prepare('SELECT * FROM `animals`');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retrieves an animal by its ID.
     * 
     * @return array An array containing the specified animal.
     */
    public function getById()
    {
        $stmt = $this->db->prepare('SELECT * FROM `animals` WHERE `id` = :id');
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retrieves animals by enclosure.
     * 
     * @return array An array containing animals from the specified enclosure.
     */
    public function getByEnclosure()
    {
        $stmt = $this->db->prepare('SELECT * FROM `animals` WHERE `id_enclosure` = :id_enclosure');
        $stmt->bindValue(':id_enclosure', $this->id_enclosure, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Modifies the information of an animal in the database.
     * 
     * @return bool True if the modification was successful, false otherwise.
     */
    public function modify()
    {
        $sql = 'UPDATE `animals` SET name = :name, description = :description, specie = :specie, id_enclosure = :id_enclosure WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':specie', $this->specie, PDO::PARAM_STR);
        $stmt->bindValue(':id_enclosure', $this->id_enclosure, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Deletes an animal from the database.
     * 
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function delete()
    {
        $stmt = $this->db->prepare('DELETE FROM `animals` WHERE `id` = ?');
        $stmt->execute([$this->id]);
        return $stmt->fetch();
    }

}
