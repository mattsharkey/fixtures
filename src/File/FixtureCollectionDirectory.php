<?php

namespace CreativeServices\Fixtures\File;

use Eloquent\Pathogen\FileSystem\FileSystemPath;
use Eloquent\Pathogen\PathInterface;

class FixtureCollectionDirectory implements FixtureCollectionDirectoryInterface
{
    /**
     * @var \Eloquent\Pathogen\PathInterface
     */
    private $root;

    public function __construct($rootPath)
    {
        $this->root = FileSystemPath::fromString($rootPath);
    }

    public function getFixture($name)
    {
        $fixturePath = $this->makeFixturePath($name);
        if (file_exists($fixturePath->string())) {
            return FixtureFile::make($fixturePath);
        }
        throw new \OutOfBoundsException("Fixture not found: $name");
    }

    /**
     * @param string $name
     * @return PathInterface
     */
    private function makeFixturePath($name)
    {
        $relativePath = FileSystemPath::fromString($name);
        $path = $this->root->resolve($relativePath);
        if (!$this->root->isAncestorOf($path)) {
            throw new \OutOfBoundsException("Fixture not in directory: {$relativePath->string()}");
        }
        return $path;
    }
}