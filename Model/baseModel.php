<?php

namespace Younes\DriveLoc\Model;

class BaseModel {

    public function __get($property) {
        return $this->$property;
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }
}

?>