<?php

namespace App\Actions;

use App\Models\Article;

class CreateArticle
{
    public function create($data)
    {
        $article = new Article();
        
        $article->create([
            'section_id' => $data['section_id'],
            'title' => $data['title'],
            'created' => $data['created'] ?? date('Y-m-d H:i:s'),
        ]);

        return $data;
    }
}