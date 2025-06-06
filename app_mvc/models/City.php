<?php
require_once __DIR__ . '/../config/database.php';

class City {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function search($query) {
        $stmt = $this->db->prepare("SELECT * FROM cities WHERE city LIKE ? ");
        $q = "%" . $query . "%";
        $stmt->execute([$q, $q]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Metodo para paginacion
    public function getAll($limit = 5, $offset = 0) {
        $stmt = $this->db->prepare("SELECT * FROM cities LIMIT ? OFFSET ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function countAll() {
        $stmt = $this->db->query("SELECT COUNT(*) FROM cities");
        return $stmt->fetchColumn();
    }

    // public function getAll() {
    //     $stmt = $this->db->query("SELECT * FROM cities");
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function create($city) {
        $stmt = $this->db->prepare("INSERT INTO cities (city) VALUES (?)");
        return $stmt->execute([$city]);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM cities WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update($id, $city) {
        $stmt = $this->db->prepare("UPDATE cities SET city = ? WHERE id = ?");
        return $stmt->execute([$city, $id]);
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM cities WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
}
