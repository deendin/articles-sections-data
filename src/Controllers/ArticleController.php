<?php

namespace App\Controllers;

use App\Requests\ArticleStoreRequest;
use App\Transformers\ArticleTransformer;
use App\Actions\CreateArticle;
use App\Models\Article;

class ArticleController
{
    /**
     * Constructor
     * 
     */
    public function __construct(
    ) {
    }

    /**
     * Create a new article
     * 
     * @param App\Requests\ArticleStoreRequest $request
     * 
     * @return array $transformer
     */
    public function store(ArticleStoreRequest $request) : array
    {
        $creator = (new CreateArticle());

        $data = $creator->create($request->all());

        return (new ArticleTransformer($data))->transform($data);
    }

    /**
     * Returns all articles.
     * 
     */
    public function index()
    {
        $article = new Article();
        $articles = $article->latest(10);

        return $articles;
    }
}