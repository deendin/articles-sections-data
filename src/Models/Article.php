<?php

namespace App\Models;

use App\Models\BaseModel;

class Article
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new BaseModel();
    }

    public function create(array $data)
    {
        $query = "INSERT INTO articles (title,section_id,created) VALUES (?, ?, ?)";

        $paramType = "sis";

        $paramValue = array(
            $data['title'],
            $data['section_id'],
            $data['created']
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        return $insertId;
    }

    public function latest(int $limit = 10)
    {
        $sql = "SELECT DISTINCT a.id as id, a.title as title, a.created as created, a.section_id as article_section, s.section_id as section_id, s.section_name as section_name FROM articles as a LEFT JOIN sections as s ON s.section_id = a.section_id ORDER BY a.id DESC LIMIT ?";
        $paramType = "i";
        $paramValue = array(
            $limit
        );
        $result = $this->db_handle->runQuery($sql, $paramType, $paramValue);
        return $result;
    }
}