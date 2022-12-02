<?php

namespace App\Transformers;

class SectionTransformer
{
    /**
     * The section data to transform.
     * 
     * @var $data;
     */
    private readonly array $data;

    /**
     * 
     * @param $data;
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    /**
     * Transforms the incoming section data instance into an array.
     * 
     * @param $section;
     * 
     * @return array
     */
    public function transform() : array
    {
        return $this->data;
    }

}
