<?php

namespace App\Controllers;

use App\Requests\SectionStoreRequest;
use App\Transformers\SectionTransformer;
use App\Actions\CreateSection;
use App\Repositories\SectionRepository;

class SectionController
{
    /** @var SectionRepository */
    private $sectionRepository;

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
     * @param App\Requests\SectionStoreRequest $request
     * 
     * @return array $transformer
     */
    public function store(SectionStoreRequest $request) : array
    {
        $creator = (new CreateSection());

        $data = $creator->create($request->all());

        return (new SectionTransformer($data))->transform();
    }

    /**
     * Returns all sections.
     * 
     * @return SectionResource
     */
    public function index() : array
    {
        $data = $this->sectionRepository->findAll();

        return (new SectionTransformer($data));
    }
}