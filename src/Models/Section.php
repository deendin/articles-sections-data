<?php

namespace App\Models;

use App\Models\BaseModel;

class Section
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new BaseModel();
    }

    public function create(array $data)
    {
        $query = "INSERT INTO sections (section_id,section_name) VALUES (?, ?)";

        $paramType = "is";

        $paramValue = array(
            $data['section_id'],
            $data['section_name']
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        return $insertId;
    }
}