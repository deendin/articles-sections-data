<?php
namespace App;

use App\Controllers\SectionController;
use App\Requests\SectionStoreRequest;

class SectionTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateSection()
    {
        // prepare
        $request = new SectionStoreRequest();

        // process
        $request->section_name = 'section1';
        $section_id = mt_rand(1, 1000);
        $request->section_id = $section_id;

        // execute
        $article = (new SectionController());
        $response = $article->store($request);

        $this->assertEquals([
            'section_name' => $request->section_name,
            'section_id' => $section_id,
        ], $response);
    }
}