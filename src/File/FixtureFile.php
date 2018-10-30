<?php

namespace CreativeServices\Fixtures\File;

use CreativeServices\Fixtures\Json\JsonFixtureFile;
use CreativeServices\Fixtures\Php\PhpFixtureFile;
use CreativeServices\Fixtures\Yaml\YamlFixtureFile;
use Eloquent\Pathogen\PathInterface;

class FixtureFile implements FixtureFileInterface
{
    private $path;

    public static function make(PathInterface $fixturePath)
    {
        switch ($fixturePath->extension()) {
            case 'json':
                return new JsonFixtureFile($fixturePath);
            case 'php':
                return new PhpFixtureFile($fixturePath);
            case 'yml':
            case 'yaml':
                return new YamlFixtureFile($fixturePath);
            default:
                throw new static($fixturePath);
        }
    }

    public function __construct(PathInterface $path)
    {
        $this->path = $path;
        if (!is_file($path->string())) {
            throw new \InvalidArgumentException("Not a file: {$path->string()}");
        }
    }

    public function getContext()
    {
        return file_get_contents($this->getPathAsString());
    }

    protected function getPathAsString()
    {
        return $this->path->string();
    }
}