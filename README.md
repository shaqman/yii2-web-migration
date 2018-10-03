# shaqman/yii2-web-migration
Migration to be used from web interface. Useful when you have no shell access.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist shaqman/yii2-web-migration
```

or add

```json
"shaqman/yii2-web-migration": "*"
```

## Usage

### Module Configuration
Configure `yii2-web-migration` module.
```php
'modules' => [
    'web-migration' => [
        // the module class
        'class' => 'shaqman\web\migration\Module',
    ],
    // your other modules
]
```

### Migrate

Create your [migrations](https://www.yiiframework.com/doc/guide/2.0/en/db-migrations/) as usual, and you can apply the migrations by triggering your module name.

```
http://localhost/index.php?r=web-migration/default&action=up
```

```
http://localhost/index.php?r=web-migration/default&action=down
```
