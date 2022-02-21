# Laravel Zenvia

This package provides integration with the Zenvia API. It supports sending SMS messages.

The package simply provides a `Zenvia` facade that acts as a wrapper to the [Zenvia API](https://zenvia.github.io/zenvia-openapi-spec/v2/#section/SMS-Text).

## Installation

You can install this package via Composer using:

```bash
composer require idez/laravel-zenvia
```

You must also install the service provider.
> Laravel 5.5+ users: this step may be skipped, as the package supports auto discovery.

```php
// config/app.php
'providers' => [
    ...
    Idez\LaravelZenvia\ZenviaServiceProvider::class,
    ...
];
```

## Configuration


Add the following snippet into your  `app/config/services.php`:

```php
// config/services.php
    'zenvia' => [
        'from' => env('ZENVIA_FROM', 'Laravel'),
        'token' => env('ZENVIA_TOKEN'),
    ],
```


Set your configuration using **environment variables**, either in your `.env` file or on your server's control panel:

- `ZENVIA_FROM`

An identifier, since many other senders may use the same short number. This will prefix your message contents.

- `ZENVIA_TOKEN`

Token for the authenticating account. Generate your token on the [API console](https://app.zenvia.com/home/api) on Zenvia platform.

## Usage

```php
<?php

use Idez\LaravelZenvia\Zenvia;

class MyClass {

    public function __construct(private Zenvia $zenvia) {
    }

    public function sendSMS() {
        $this->zenvia->sms(
            number: '552199999999',
            message: 'Hello world'
        );
    }

}
```

This package is available under the [MIT license](http://opensource.org/licenses/MIT).