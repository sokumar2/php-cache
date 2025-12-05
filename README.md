# PHP Cache
[![LICENSE](https://img.shields.io/badge/License-MIT-green)](./LICENSE)
![PHP8](https://img.shields.io/badge/php-%3E%3D8.4.0-blue?logoColor=white&style=flat)

An LRU (Least Recently Used) and MRU (Most Recently Used) cache implementations in PHP.

## Usage
### LRU
```php
$cache = new CacheFactory()->createInstance(3);
$cache->put('key', '<value>');

$cache->get('key');
```

### MRU
```php
use SK\Cache\Type as CacheType;

...
$cache = new CacheFactory()->createInstance(3, CacheType::MRU);
...
```

## Tests
```console
composer run test
```
