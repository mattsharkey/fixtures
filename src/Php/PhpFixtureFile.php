<?php

namespace CreativeServices\Fixtures\Php;

use CreativeServices\Fixtures\File\FixtureFile;

class PhpFixtureFile extends FixtureFile implements PhpFixtureFileInterface
{
    public function getContext()
    {
        return include($this->getPathAsString());
    }
}