<?php

namespace App\Actions;

use App\Models\Section;

class CreateSection
{
    public function create($data)
    {
        $article = new Section();
        
        $article->create([
            'section_id' => $data['section_id'],
            'section_name' => $data['section_name'],
        ]);
        
        return $data;
    }
}