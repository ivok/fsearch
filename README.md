### Instalation

Add package repository
```json
"repositories": [
    ...
    {
        "type": "path",
        "url": "../fsearch"
    }
],
```

Install the package
```bash
composer require ivo/fsearch
```

### Usage

#### Inside Laravel project
```php
$result = Fsearch::search($this->argument('content'), $this->argument('path'));
print_r($result)
```

#### Access through url in laravel project
```
http://domain.tld/fs
```

#### Cli command
```bash
php artisan fsearch "content to search" "path/to/dir"
```
