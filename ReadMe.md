# HasKey

The `HasKey` package provides a trait for Laravel Eloquent models to automatically generate unique keys based on the model's class name and a random string. The length of the class name substring and the random string length are configurable.

## Features

- Generates a unique key automatically when creating a new model.
- Customizable substring length and random key length via configuration.
- Simple to integrate with any Eloquent model.

## Installation

### 1. Install the Package

In your Laravel project, add the package to your `composer.json` by requiring it:

```bash
composer require tiemksy/haskey

```


### 2. Publish the Configuration (Optional)

To customize the length of the class name substring and the random string in the key, publish the package's configuration file:
```bash
php artisan vendor:publish --tag=config --provider="Tiemsky\HasKey\HasKeyServiceProvider"

```

This command will create a configuration file at config/haskey.php.
Configuration

After publishing the configuration file, you can adjust the following settings in config/haskey.php:

return [
    'substring_length' => 3, // Default length of the class name prefix (customizable)
    'key_length' => 10,      // Default length for the random string part of the key (customizable)
];

## Default Values

    substring_length: Defines the length of the prefix derived from the model’s class name. Defaults to 3.
    key_length: Sets the length of the random string appended to the key. Defaults to 10.

## Usage

    Add the HasKey Trait to Your Model

    To use the HasKey trait, simply add it to any Eloquent model where you want a unique key to be generated.

    <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tiemsky\HasKey;

class YourModel extends Model
{
    use HasKey;

    // Additional model code
}

## Creating a Model Instance

When a new model instance is created, the HasKey trait will automatically generate a unique key in the format:

{class_prefix}_{random_string}

    class_prefix: The first few characters of the class name, as defined by substring_length.
    random_string: A random string, as defined by key_length.

## Example

For a model named Product, with the default configuration:

    substring_length of 3
    key_length of 10

The generated key might look like: pro_aBc123XyZq.

### Development
## 1. Testing

To ensure that your package works as expected, you can write tests in the tests/ directory of your package (create it if it doesn't exist).
## 2. Contributing

Contributions are welcome! Feel free to submit a pull request or open an issue if you find bugs or have suggestions.
License

This package is open-sourced software licensed under the MIT license.