# Fixtures are static pieces of content.

They can be used to populate templates during development. They can also serve as content sources for static site generators and style guides.

## Supported formats

- JSON
- YAML
- Markdown

## Usage

Create a fixture collection from a directory of fixture files:

````
$fixtures = FixtureCollection::fromDirectory('/path/to/fixture/files');
````

Get a piece of content from the collection:

````
$context = $fixtures['fixture-file.json'];
````

When the Twig extension is enabled, fixture content is available inside templates with the `_fixture` function:

````
{% set article = _fixture('article.json') %}

{{ article.title }}
````

