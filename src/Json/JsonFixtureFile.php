<?php

namespace CreativeServices\Fixtures\Json;

use CreativeServices\Fixtures\File\FixtureFile;

class JsonFixtureFile extends FixtureFile implements JsonFixtureFileInterface
{
    public function getContext()
    {
        return json_decode(file_get_contents($this->getPathAsString()));
    }
}