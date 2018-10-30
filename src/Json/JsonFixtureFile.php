<?php

namespace CreativeServices\Fixtures\Json;

use CreativeServices\Fixtures\File\FixtureFile;

class JsonFixtureFile extends FixtureFile implements JsonFixtureFileInterface
{
    public function getContext()
    {
        return json_decode(parent::getContext());
    }
}