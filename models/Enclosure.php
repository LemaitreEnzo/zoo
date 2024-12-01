<?php

namespace Models;

use \PDO as PDO;
use \Exception as Exception;

/**
 * Class Enclosure representing an enclosure in the database.
 */
class Enclosure extends Database
{
    private $id;
    private $name;
    private $description;
    private $created_at;

    /**
     * Gets the enclosure's ID.
     * 
     * @return int The enclosure's ID.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the enclosure's name.
     * 
     * @return string The enclosure's name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the enclosure's description.
     * 
     * @return string The enclosure's description.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Gets the enclosure's creation date.
     * 
     * @return string The enclosure's creation date.
     */
    public function getDate()
    {
        return $this->created_at;
    }

    /**
     * Sets the enclosure's ID.
     * 
     * @param int $id The enclosure's ID.
     * @throws Exception If the ID is invalid.
     */
    public function setId($id)
    {
        if (empty($id)) throw new Exception('The enclosure ID is required');
        if (!is_numeric($id)) throw new Exception('The enclosure ID must be an integer');
        $floatVal = floatval($id);
        $id = intval($id);
        if ($id != $floatVal) throw new Exception('The enclosure ID must be an integer');
        if ($id <= 0) throw new Exception('The enclosure ID must be greater than 0');

        $this->id = htmlspecialchars($id);
    }

    /**
     * Sets the enclosure's name.
     * 
     * @param string $name The enclosure's name.
     * @throws Exception If the name is invalid.
     */
    public function setName($name)
    {
        if (empty($name)) throw new Exception('The enclosure name is required');
        if (strlen($name) < 3) throw new Exception('The enclosure name must be at least 3 characters long');
        if (strlen($name) > 50) throw new Exception('The enclosure name must be at most 50 characters long');

        $this->name = htmlspecialchars($name);
    }

    /**
     * Sets the enclosure's description.
     * 
     * @param string $description The enclosure's description.
     * @throws Exception If the description is invalid.
     */
    public function setDescription($description)
    {
        if (empty($description)) throw new Exception('The enclosure description is required');
        if (strlen($description) < 3) throw new Exception('The enclosure description must be at least 3 characters long');
        if (strlen($description) > 100) throw new Exception('The enclosure description must be at most 100 characters long');

        $this->description = htmlspecialchars($description);
    }

    /**
     * Adds a new enclosure to the database.
     * 
     * @return array An array containing the added enclosure.
     */
    public function addEnclosure()
    {
        $stmt = $this->db->prepare('INSERT INTO `enclosure` (name, description) VALUES (:name, :description)');
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Retrieves all enclosures from the database.
     * 
     * @return array An array containing all enclosures.
     */
    public function get()
    {
        $stmt = $this->db->prepare('SELECT * FROM `enclosure`');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retrieves an enclosure by its ID.
     * 
     * @return array An array containing the specified enclosure.
     */
    public function getById()
    {
        $stmt = $this->db->prepare('SELECT * FROM `enclosure` WHERE `id` = :id');
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Modifies the information of an enclosure in the database.
     * 
     * @return bool True if the modification was successful, false otherwise.
     */
    public function modify()
    {
        $sql = 'UPDATE `enclosure` SET `name` = :name, `description` = :description WHERE `id` = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Deletes an enclosure from the database.
     * 
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function delete()
    {
        $stmt = $this->db->prepare('DELETE FROM `enclosure` WHERE `id` = ?');
        $stmt->execute([$this->id]);
        return $stmt->fetch();
    }

    /**
     * Counts the number of animals in the enclosure.
     * 
     * @return int The number of animals in the enclosure.
     * @throws Exception If the enclosure ID is not set.
     */
    public function countAnimals()
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) AS animal_count FROM `animals` WHERE `id_enclosure` = :id_enclosure');
        $stmt->bindValue(':id_enclosure', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['animal_count'] ?? 0; // Return 0 if no animals are found
    }
}
