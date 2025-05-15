<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php'; // Autocargador de Composer
require_once __DIR__ . '/../src/Services/MailService.php'; // Incluir el servicio de correo

use App\Services\MailService;

class User {
    private $db;
    private $mailService;

    public function __construct() {
        $this->db = Database::connect();
        $this->mailService = new MailService(); // Instanciar el servicio de correo
    }

    public function search($query) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE name LIKE ? OR email LIKE ?");
        $q = "%" . $query . "%";
        $stmt->execute([$q, $q]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Metodo para paginacion
    public function getAll($limit = 5, $offset = 0) {
        $stmt = $this->db->prepare("SELECT * FROM users LIMIT ? OFFSET ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll() {
        $stmt = $this->db->query("SELECT COUNT(*) FROM users");
        return $stmt->fetchColumn();
    }

    public function create($name, $email, $pass) {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $result = $stmt->execute([$name, $email, $pass]);

        if ($result) {
            // Enviar correo de bienvenida después del registro exitoso
            $this->mailService->enviarCorreoBienvenida($email, $name);
        }

        return $result;
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $email) {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para exportar usuarios
    public function export()
    {
        $sql = "SELECT id, name, email FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve un array de arrays asociativos
    }


}