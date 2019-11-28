# laravel-aws-cache-adapter
Laravel cache adapter for AWS credentials in case of assuming IAM roles.

# Installation

Simply add the following line to your `composer.json` and run `composer update`

```
"arzeroid/laravel-aws-cache-adapter": "^1.0",
```

Or use composer to add it with the following command

```
composer require "arzeroid/laravel-aws-cache-adapter"
```

# Usage

 Use `LaravelAwsCacheAdapter` as credentials of S3 in your `config/filesystems.php` 

```php
's3' => [
    'driver' => 's3',          
    'credentials' => new \Arzeroid\LaravelAdapters\LaravelAwsCacheAdapter(),
    'region' => env('AWS_REGION'),
    'bucket' => env('AWS_BUCKET'),
    'timeout' => env('AWS_CREDENTIAL_TIMEOUT'),
],
```

Or use `LaravelAwsCacheAdapter` as credentials of SQS in your `config/queue.php` 

```php
'sqs' => [
    'driver' => 'sqs', 
    'credentials' => new \Arzeroid\LaravelAdapters\LaravelAwsCacheAdapter(),
    'prefix' => env('SQS_PREFIX'),
    'queue'  => env('SQS_QUEUE_NAME'),
    'region' => env('SQS_REGION'),
    'timeout' => env('AWS_CREDENTIAL_TIMEOUT'),
],
```