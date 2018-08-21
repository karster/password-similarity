# Password Similarity

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)][license]

> Email client blocks images by default. Mozify is way how to serve images to your customers.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```shell
composer require karster/password-smilarity:"dev-master"
```

or add

```
"karster/password-similarity": "dev-master"
```

to the require section of your composer.json.

## Usage

```php

use karster\security\PasswordSimilarity;
use karster\security\CryptAlgorithm;

$password = new PasswordSimilarity(CryptAlgorithm::BCRYPT);

$password->isSimilar('foo', '$2y$10$Ri1.JTGsOBeGtJj0aaRpWOLW8fu6/LDmWxRFHXJugdhXp3W88Ng2y'); // true

```

## Tests

```
./vendor/bin/phpunit -c phpunit.xml
```

## Contribution
Have an idea? Found a bug? See [how to contribute][contributing].

## License
MIT see [LICENSE][] for the full license text.

[license]: LICENSE.md
[contributing]: CONTRIBUTING.md