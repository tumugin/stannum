# Stannum

[![phpcs(PSR12)](https://github.com/tumugin/stannum/actions/workflows/phpcs.yml/badge.svg)](https://github.com/tumugin/stannum/actions/workflows/phpcs.yml)
[![CI](https://github.com/tumugin/stannum/actions/workflows/phpunit.yml/badge.svg)](https://github.com/tumugin/stannum/actions/workflows/phpunit.yml)
[![Coverage Status](https://coveralls.io/repos/github/tumugin/stannum/badge.svg?branch=main)](https://coveralls.io/github/tumugin/stannum?branch=main)

Stannum makes PHP's scalar types more expressive!

This project is under development. It is not recommended using in production.

# Supported environments

Stannum supports and tested on PHP 7.4 or above.

Currently, Stannum is tested on the CI environment below.

- PHP 7.4/8.0/8.1 on latest Windows
- PHP 7.4/8.0/8.1 on latest Ubuntu(Linux)
- PHP 7.4/8.0/8.1 on latest macOS

# How to use

```php
// Will return [1, 3, 5]
SnList::fromArray([1, 2, 3, 4, 5, 6])
    ->filter(fn(int $val) => $val % 2 !== 0)
    ->toArray();
```
