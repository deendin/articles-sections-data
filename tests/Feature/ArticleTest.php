<?php
namespace App;

use App\Controllers\ArticleController;
use App\Requests\ArticleStoreRequest;
use App\Models\Article;

class ArticleTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateSection()
    {
        // prepare
        $request = new ArticleStoreRequest();

        // process
        $request->title = 'first_title';
        $section_id = mt_rand(1, 1000);
        $request->section_id = $section_id;

        // execute
        $article = (new ArticleController());
        $response = $article->store($request);

        $this->assertEquals([
            'title' => $request->title,
            'section_id' => $section_id,
        ], $response);
    }
}