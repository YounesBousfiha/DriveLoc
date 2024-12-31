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
    
    public function update() {}
    public function delete() {}
    public function all() {}
    public function find($id) {}
    public function where() {}
}

?>