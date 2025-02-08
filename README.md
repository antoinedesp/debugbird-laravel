# DebugBird Laravel SDK

DebugBird Laravel SDK provides seamless log and crash collection for your Laravel applications, sending data to your DebugBird dashboard.

## Installation

You can install the package via Composer:

```sh
composer require debugbird/laravel
```

Then, publish the configuration file:

```sh
php artisan vendor:publish --tag=debugbird-config
```

## Configuration

After publishing, configure your `.env` file:

```env
DEBUGBIRD_PROJECT_ID=your_project_id
DEBUGBIRD_API_KEY=your_api_key
DEBUGBIRD_LOG_LEVEL=error # Available options: debug, info, warning, error, critical
```

You can disable log or crash collection in your `.env` file:

```env
DEBUGBIRD_DISABLE_LOGS=true
DEBUGBIRD_DISABLE_ERRORS=true
```

## Usage

### Automatic Logging

Once installed, DebugBird will automatically capture logs and exceptions based on the log level defined in your `.env` file.

### Manually Logging Messages

You can manually log messages with different types:

```php
use DebugBird\DebugBird;

DebugBird::log('info', 'This is an informational message');
DebugBird::log('warning', 'This is a warning message');
DebugBird::log('error', 'This is an error message');
```

### Custom Exception Handling

If you want to manually capture exceptions, you can do:

```php
try {
    throw new Exception('Something went wrong!');
} catch (Exception $e) {
    DebugBird::captureException($e);
}
```

## Contributing

Feel free to submit issues and pull requests to improve this SDK.

## License

This package is proprietary. Contact [developer@yutechnologies.co](mailto:developer@yutechnologies.co) for licensing inquiries.
