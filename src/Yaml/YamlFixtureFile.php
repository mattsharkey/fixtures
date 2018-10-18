<?php

namespace CreativeServices\Fixtures\Yaml;

use CreativeServices\Fixtures\File\FixtureFile;
use Symfony\Component\Yaml\Yaml;

class YamlFixtureFile extends FixtureFile implements YamlFixtureFileInterface
{
    public function getContext()
    {
        return Yaml::parseFile($this->getPathAsString());
    }
}