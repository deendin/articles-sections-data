<?php

namespace App\Transformers;

class ArticleTransformer
{
    /**
     * The article data to transform.
     * 
     * @var $data;
     */
    private $data;

    /**
     * 
     * @param $data;
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    /**
     * Transforms the incoming user data instance into an array.
     * 
     * @param $user;
     * @return array
     */
    public function transform() : array
    {
        return $this->data;
    }

}
