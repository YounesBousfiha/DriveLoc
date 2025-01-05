<?php

namespace Younes\DriveLoc\Controller;

trait VehiculeController {
    private $db;
    private $tableVehicule = 'vehicules';

    public function createVehicule($data) {
        $columns = implode(",", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO {$this->tableVehicule} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        
        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
        
        return $stmt->execute();
    }

    public function getAllVehicules() {
        $sql = "SELECT * FROM {$this->tableVehicule}";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return null;
        }
    }

    public function getVehicule($id) {
        $sql = "SELECT * FROM {$this->tableVehicule} WHERE vehicule_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        if($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return null;
        }
    }

    public function updateVehicule($id, $data) {
        $columns = [];
        foreach ($data as $key => $value) {
            $columns[] = "$key = :$key";
        }
        $sql = "UPDATE {$this->tableVehicule} SET " . implode(', ', $columns) . " WHERE vehicule_id = :id";
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(":id", $id);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
        
        return $stmt->execute();
    }

    public function deleteVehicule($id) {
        $sql = "DELETE FROM {$this->tableVehicule} WHERE vehicule_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public function search($keyword) {
        $sql = "SELECT * FROM {$this->tableVehicule} WHERE vehicule_marque LIKE :keyword OR vehicule_modele LIKE :keyword";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":keyword", "%$keyword%");
        if($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return null;
        }
    }
}



?>