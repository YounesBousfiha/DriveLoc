<?php

class Base {
    private $db;
    private $table = null;

    public function __construct($db, $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    public function create($data) {
        $columns = implode(",", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
    
        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
    
        $stmt->execute();
    }

    public function all() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return null;
        }
    }

    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->table} . '_id' = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param(":id", $id);
        if($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return null;
        }
    }
    public function where() {}
    public function update() {}
    public function delete() {}
}

?>