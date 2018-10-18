<?php

namespace CreativeServices\Fixtures\Collection;

use CreativeServices\Fixtures\FixtureInterface;

interface FixtureCollectionInterface
{
    /**
     * @param string $name
     * @return FixtureInterface
     */
    public function getFixture($name);
}