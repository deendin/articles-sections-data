<?php
namespace App;

use App\Commands\PopulateArticleData;

class ParseArticleDataTest extends \PHPUnit\Framework\TestCase
{
    public function testPopulateArticleData()
    {
        $articlesCount = (new PopulateArticleData())
                            ->handle(dirname(__DIR__, 2).'/features/resultset.csv');

        $this->assertEquals(499, $articlesCount);
    }
}