# Trustpilot Authenticator

[![Latest Stable Version](https://poser.pugx.org/moneymaxim/trustpilot-authenticator/v/stable)](https://packagist.org/packages/moneymaxim/trustpilot-authenticator)
[![Total Downloads](https://poser.pugx.org/moneymaxim/trustpilot-authenticator/downloads)](https://packagist.org/packages/moneymaxim/trustpilot-authenticator)
[![License](https://poser.pugx.org/moneymaxim/trustpilot-authenticator/license)](https://packagist.org/packages/moneymaxim/trustpilot-authenticator)

A PHP library for obtaining [Trustpilot Business User API](https://developers.trustpilot.com/authentication) access tokens.

This library has been developed and open sourced by [moneymaxim](https://www.moneymaxim.co.uk).

We are currently on the look out for PHP programming talent, so please [get in touch](mailto:andrew.carter@moneymaxim.co.uk) if you are interested.

## Install

Install using [composer](https://getcomposer.org/):

```sh
composer install moneymaxim/trustpilot-authenticator
```

## Usage

```php
$authenticator = new Trustpilot\Api\Authenticator\Authenticator();

$accessToken = $authenticator->getAccessToken($apiKey, $apiToken, $username, $password);

// $accessToken->getToken(): string
// $accessToken->hasExpired(): bool
// $accessToken->getExpiry(): \DateTimeImmutable
// $accessToken->serialize(): string
```
