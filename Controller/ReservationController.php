<?php

namespace Younes\DriveLoc\Controller;

trait ReservationController
{
    private $db;
    private $tableReservation = 'reservation';

    public function approuverReservation($id)
    {
        $query = "UPDATE $this->tableReservation SET reservation_status = 'Approuve' WHERE reservation_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function rejectReservation($id)
    {
        $query = "UPDATE $this->tableReservation SET reservation_status = 'Reject' WHERE reservation_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function createReservation($data)
    {
        $columns = implode(",", array_keys(get_object_vars($data)));
        $placeholders = ":" . implode(", :", array_keys(get_object_vars($data)));
        $sql = "INSERT INTO {$this->tableReservation} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        return $stmt->execute();
    }

    public function getAllReservations()
    {
        $sql = "SELECT * FROM {$this->tableReservation}";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return null;
        }
    }

    public function getReservationForUser($user_id) {
        $sql = "SELECT * FROM ReservationForUser WHERE fk_user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        if($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return null;
        }
    }

}