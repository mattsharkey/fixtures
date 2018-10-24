<?php

namespace CreativeServices\Fixtures\File;

use CreativeServices\Fixtures\Json\JsonFixtureFile;
use CreativeServices\Fixtures\Json\MarkdownFixtureFile;
use CreativeServices\Fixtures\Php\PhpFixtureFile;
use CreativeServices\Fixtures\Yaml\YamlFixtureFile;
use Eloquent\Pathogen\PathInterface;

abstract class FixtureFile implements FixtureFileInterface
{
    private $path;

    public static function make(PathInterface $fixturePath)
    {
        switch ($fixturePath->extension()) {
            case 'json':
                return new JsonFixtureFile($fixturePath);
            case 'md':
                return new MarkdownFixtureFile($fixturePath);
            case 'php':
                return new PhpFixtureFile($fixturePath);
            case 'yml':
            case 'yaml':
                return new YamlFixtureFile($fixturePath);
            default:
                throw new \DomainException("Unrecognized fixture type: {$fixturePath->extension()}");
        }
    }

    public function __construct(PathInterface $path)
    {
        $this->path = $path;
        if (!is_file($path->string())) {
            throw new \InvalidArgumentException("Not a file: {$path->string()}");
        }
    }

    protected function getPathAsString()
    {
        return $this->path->string();
    }
}