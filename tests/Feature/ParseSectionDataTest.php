<?php
namespace App;

use App\Commands\PopulateSectionData;

class ParseSectionDataTest extends \PHPUnit\Framework\TestCase
{
    public function testPopulateSectionData()
    {
        $sectorsCount = (new PopulateSectionData())
                            ->handle(dirname(__DIR__, 2).'/features/resultset.csv');

        $this->assertEquals(499, $sectorsCount);
    }
}