<?php

namespace App\Commands;

use App\Actions\CreateArticle;
use App\Requests\ValidateCSVRequest;

class PopulateArticleData extends ValidateCSVRequest
{
    /**
     * Handles and create a new article from the csv file
     * 
     */
    public function handle(string $filepath = null) : int | bool
    {
        $insertions = 0;

        if( ! $this->validate($filepath) ) {
            return 0;
        }

        $data = read_file($filepath);

        foreach ($data as $article => $value) {
            
            // prepare
            $data['section_id'] = $value['section_id'];
            $data['title'] = $value['title'];
            $data['created'] = $value['created'];

            // execute
            $article = (new CreateArticle());
            $response = $article->create($data);

            $insertions += 1;
        }

        return $insertions;
    }
}