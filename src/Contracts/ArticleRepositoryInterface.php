<?php

namespace App\Contracts;

interface ArticleRepositoryInterface
{
    /**
     * Finds all of the articles.
     * 
     */
    public function findAll();

}