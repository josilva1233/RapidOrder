<?php
// /models/Model.php
namespace App\Models;

use PDO;

abstract class Model {
    protected $db;
    protected $table;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function findAll() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data) {
        $keys = implode(',', array_keys($data));
        $values = ':' . implode(',:', array_keys($data));
        $query = "INSERT INTO {$this->table} ($keys) VALUES ($values)";
        $stmt = $this->db->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function update($id, array $data) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key,";
        }
        $set = rtrim($set, ',');

        $query = "UPDATE {$this->table} SET $set WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
