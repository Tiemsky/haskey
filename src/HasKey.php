<?php

declare(strict_types=1);

namespace Tiemsky\HasKey;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasKey
{
    protected static function bootHasKey(): void
    {
        static::creating(function (Model $model) {
            // Load customizable configuration values with defaults
            $substringLength = config('haskey.substring_length', 3);  // Default to 3 if not set
            $keyLength = config('haskey.key_length', 10);             // Default to 10 if not set

            // Generate the key
            $model->key = substr(strtolower(class_basename($model)), 0, $substringLength)
                . '_' . Str::random($keyLength);
        });
    }
}
