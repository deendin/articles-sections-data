<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface as Contract;
use App\Models\Article;

class ArticleRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return Article::latest(10);
    }
}