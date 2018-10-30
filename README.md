# Fixtures are static pieces of content.

They can be used to populate templates during development. They can also serve as content sources for static site generators and style guides.

## Default integrations

These file formats are automatically parsed and returned as complex data:

- JSON
- YAML

## Usage

Create a fixture collection from a directory of fixture files:

````$php
use CreativeServices\Fixtures\File\FixtureCollectionDirectory;

$fixtures = new FixtureCollectionDirectory('/path/to/fixture/files');
````

Get a piece of content from the collection:

````
$content = $fixtures->getFixture('fixture-file.json');
````

## Twig integration

Add the fixture function to your Twig environment:

````$php
use CreativeServices\Fixtures\Twig\FixtureFunction;

$twig->addFunction(new FixtureFunction($fixtures));
````

Fixture content will be available inside templates via the `_fixture` function:

````$php
{% set article = _fixture('article.json') %}

{{ article.title }}
````

