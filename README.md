<p align="center"><a href="https://laravel.com/docs/12.x" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# What is it?

This is a clean Laravel 12 project with pre-configured tools for code quality 
and development efficiency:
1. Docker (by Sail, for local)
2. PHPStan (with Laravel ext) 
3. PHP CodeSniffer (with PSR-12 rule)
4. Rector (with Laravel ext) 
5. Pint (with PSR-12 rule)
6. Pest (for Architecture Test)
7. PHPUnit
8. Peck
9. Telescope
10. Make (+ composer scripts)

All tools are configured to complement each other and work together without conflicts.
The default settings may feel quite strict at first, but you can gradually relax
them as you encounter issues that cannot be easily resolved.

## Docker
You can use Sail for local development:
```shell
php artisan sail:install
sail up
```

Configuration file: [docker-compose.yml](docker-compose.yml)

## PHPStan

[PHPStan](https://phpstan.org/user-guide/getting-started)  is a static analysis
tool for PHP that detects bugs and type errors in your code without running it.
In this repository, PHPStan is used together with the [Laravel extension]( https://github.com/larastan/larastan).
Comfortable PHPStan level for Laravel is 8.

```shell
composer phpstan
```

Configuration file: [phpstan.neon.dist](phpstan.neon.dist)

## PHP CodeSniffer & Beautifier

[PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki/)
is a tool that checks PHP code for compliance with coding standards.
In this repository, PHPCS is configured to run with the `psr12` rule:

Check:
```shell
composer phpsc
```

Fix:
```shell
composer phpcbf
```

Configuration file: [phpcs.xml.dist](phpcs.xml.dist)

## Pint

[Pint](https://laravel.com/docs/12.x/pint) is a PHP code style fixer built on
top of [PHP CS Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer).
In this repository, Pint is configured to run with the `psr12` preset:

Check:
```shell
composer pint:check
```

Fix:
```shell
composer pint
```

Configuration file: [pint.json](pint.json)

## Rector
[Rector](https://getrector.com/documentation/) helps you modernize any PHP
codebase with instant upgrades and automated refactoring. It is integrated
with the [Laravel extension](https://github.com/driftingly/rector-laravel) in
this repository as an additional tool to support linters:

Check:
```shell
composer rector:check
```
Fix:
```shell
composer rector
```

Configuration file: [rector.php](rector.php)

## Pest
[Pest](https://pestphp.com) is a PHP testing framework built on PHPUnit.
In this repository, Pest is used for writing [architectural tests](https://pestphp.com/docs/arch-testing).
It’s best to write the rest of the tests with PHPUnit.

```shell
composer test:arch
```

Predefined tests: [ArchTest.php](tests/Architecture/ArchTest.php)

## Peck
[Peck](https://github.com/peckphp/peck) a tool for identify wording or spelling
mistakes in your codebase.

```shell
composer peck
```

Configuration file: [peck.json](peck.json)

## Telescope
[Laravel Telescope](https://laravel.com/docs/12.x/telescope)  is a valuable
debugging tool for Laravel projects. In this repository, its files are
excluded from **git**, and it is registered only in the local environment through
[bootstrap/providers.php](bootstrap/providers.php).

Telescope default URL: `%localhost%/telescope`

Configuration file: [config/telescope.php](config/telescope.php)

### Installation
1. Remove `"laravel/telescope"` from `extra.laravel.dont-discover` section
   in [composer.json](composer.json).
2. Ensure that the `database/migrations` folder does not include the Telescope
   migration file `*_create_telescope_entries_table.php`. If it is present and
   the migration has already been applied, you can either rename or remove the
   new migration file that will be created after executing the command below.
3. Run next commands:
```shell
composer du
composer install:telescope
```
4. Run the migration if it was not applied earlier
```shell
php artisan migrate
```
5. Rollback changes in [bootstrap/providers.php](bootstrap/providers.php).
6. Set `TELESCOPE_ENABLED=true` in [.env](.env).

## Make

You can also create and manage your own custom commands using [Make](https://makefiletutorial.com/#getting-started).
In this repository, commands related to vendor libraries are defined in the Composer scripts section.
Check both files to see the other predefined commands.

## More

Also could be helpful:
* [Rector SwissKnife](https://github.com/rectorphp/swiss-knife)
* [Deptrac](https://deptrac.github.io/deptrac/)
* [Laravel Blueprint](https://blueprint.laravelshift.com/)
