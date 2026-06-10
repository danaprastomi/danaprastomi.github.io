<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Get a company profile value by key.
     */
    public static function getValue(string $key, ?string $default = null): ?string
    {
        $profile = static::where('key', $key)->first();

        return $profile?->value ?? $default;
    }

    /**
     * Set a company profile value by key (create or update).
     */
    public static function setValue(string $key, string $value): static
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value],
        );
    }
}
