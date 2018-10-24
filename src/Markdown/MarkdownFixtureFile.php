<?php

namespace CreativeServices\Fixtures\Markdown;

use CreativeServices\Fixtures\File\FixtureFile;

class MarkdownFixtureFile extends FixtureFile implements MarkdownFixtureFileInterface
{
    public function getContext()
    {
        $parser = new \Parsedown();
        return $parser->text(file_get_contents($this->getPathAsString()));
    }
}