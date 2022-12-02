<?php

namespace App\Requests;

class SectionStoreRequest
{
    private $_data;

    public function __construct(array $properties = []){
      $this->_data = $properties;
    }

    public function __set($property, $value){
      return $this->_data[$property] = $value;
    }

    public function __get($property){

      return array_key_exists($property, $this->_data)
        ? $this->_data[$property]
        : null;
    }

    public function all()
    {
        return $this->_data;
    }
}