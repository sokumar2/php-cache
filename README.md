# PHP Cache
[![LICENSE](https://img.shields.io/badge/License-MIT-green)](./LICENSE)
![PHP8](https://img.shields.io/badge/php-%3E%3D8.1.0-blue?logoColor=white&style=flat)

An LRU (Least Recently Used) and MRU (Most Recently Used) cache implementations in PHP.

## Usage
```php
$cacheFactory = new CacheFactory();
$cache = $cacheFactory->createInstance(3);
$cache->put('key', '<value>');

$cache->get('key');
```

## Tests
```console
composer run test
```
