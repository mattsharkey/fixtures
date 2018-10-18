<?php

namespace CreativeServices\Fixtures\Twig;

use CreativeServices\Fixtures\File\FixtureCollectionDirectory;
use PHPUnit\Framework\TestCase;

class FixtureFunctionTest extends TestCase
{
    public function testInstantiate() {
        $collection = new FixtureCollectionDirectory(__DIR__);
        $obj = new FixtureFunction($collection);
        $this->assertInstanceOf(FixtureFunction::class, $obj);
    }
}