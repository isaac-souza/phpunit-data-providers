## Code created for the tutorial PHPUnit's @dataProviders with Laravel

[https://isaacsouza.dev/phpunit-dataprovider/](https://isaacsouza.dev/phpunit-dataprovider/)

## Installation instruction

1. Clone the repo and navigate to the directory
```
git clone git@github.com:isaac-souza/phpunit-data-providers.git
cd phpunit-data-providers
```
2. Copy the sample .env file
```
cp .env.example .env
```
3. Install the dependencies (requires at least PHP 8.0)
```
composer install
```
4. Start Laravel Sail (needs Docker installed in your system)
```
vendor/bin/sail up
```
5. Generate key
```
vendor/bin/sail artisan key:generate
```
6. Run the tests
```
vendor/bin/sail artisan test
```